<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Mail\OrderMail;
use App\Mail\OrderMailAdmin;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{

  public function createOrder(Request $request)
  {
    $user = auth()->user();
    $admin = User::where('is_admin', true)->first();
    $temp_user = session()->get('temp_user');

    if ($user) {
      if (!$user->address) {
        $request->session()->flash('add_address', "");
        return redirect()->back();
      }
    }

    $cart = session()->get('cart');
    $subtotal = 0;
    $delivery = 10;

    foreach($cart as $product => $item) {
      $subtotal += $item['price'] * $item['quantity'];
    }

    $total = $subtotal + $delivery;

    $buyer_name = $user ? $user->name : $request->buyer_name;
    $buyer_email = $user ? $user->email : $request->buyer_email;
    $buyer_address = $user ? $user->address : $request->buyer_address;

    $order = Order::create([
      'user_id' => $user ? $user->id : $admin->id,
      'buyer_name' => $buyer_name,
      'buyer_email' => $buyer_email,
      'buyer_address' => $buyer_address,
      'total' => $total
    ]);

    foreach($cart as $product => $item) {
      $a_product = Product::find($item['item_id']);

      $order->items()->create([
              'product_id'    =>  $a_product->id,
              'quantity'      =>  $item['quantity'],
              'price'         =>  $item['quantity'] * $item['price']
          ]);
    }

    $order->save();

    $curr_order = session()->get('curr_order');
    $curr_order = $order;
    session()->put('curr_order', $curr_order);

    if (!$user && !$temp_user) {
      $temp_user = [
        "name" => $request->buyer_name,
        "email" => $request->buyer_email,
        "address" => $request->buyer_address
      ];

      session()->put('temp_user', $temp_user);
    }

    return redirect()->route('checkout');
  }

  public function processTransaction(Request $request)
    {
        $curr_order = session()->get('curr_order');
        $order = Order::find($curr_order->id);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $order->total
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('checkout')
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('checkout')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        $curr_order = session()->get('curr_order');

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
          $order = Order::find($curr_order->id);

          $order->is_paid = true;
          $order->save();

          $request->session()->forget('cart');

            return redirect()
                ->route('checkout_done')
                ->with('success', 'Transaction complete.');
        } else {

          $request->session()->forget('cart');

            return redirect()
                ->route('checkout')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }


    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('checkout')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    // public function create(Request $request)
    // {
    //   $user = auth()->user();
    //   $admin = User::where('is_admin', true)->first();
    //   $temp_user = session()->get('temp_user');
    //
    //   $data = json_decode($request->getContent(), true);
    //
    //   if ($user) {
    //     if (!$user->address) {
    //       $request->session()->flash('add_address', "");
    //       return redirect()->back();
    //     }
    //   }
    //
    //   $cart = session()->get('cart');
    //   $subtotal = 0;
    //   $delivery = 10;
    //
    //   foreach($cart as $product => $item) {
    //     $subtotal += $item['price'] * $item['quantity'];
    //   }
    //
    //   $total = $subtotal + $delivery;
    //
    //   $buyer_name = $user ? $user->name : $data['buyer_name'];
    //   $buyer_email = $user ? $user->email : $data['buyer_email'];
    //   $buyer_address = $user ? $user->address : $data['buyer_address'];
    //
    //   $order = Order::create([
    //     'user_id' => $user ? $user->id : $admin->id,
    //     'buyer_name' => $buyer_name,
    //     'buyer_email' => $buyer_email,
    //     'buyer_address' => $buyer_address,
    //     'total' => $total
    //   ]);
    //
    //   foreach($cart as $product => $item) {
    //     $a_product = Product::find($item['item_id']);
    //
    //     $order->items()->create([
    //             'product_id'    =>  $a_product->id,
    //             'quantity'      =>  $item['quantity'],
    //             'price'         =>  $item['quantity'] * $item['price']
    //         ]);
    //   }
    //
    //   $order->save();
    //
    //   $request->session()->forget('cart');
    //
    //   $curr_order = session()->get('curr_order');
    //   $curr_order = $order;
    //   session()->put('curr_order', $curr_order);
    //
    //   // if (!$user && !$temp_user) {
    //   //   $temp_user = [
    //   //     "name" => $data['buyer_name'],
    //   //     "email" => $data['buyer_email'],
    //   //     "address" => $data['buyer_address']
    //   //   ];
    //   //
    //   //   session()->put('temp_user', $temp_user);
    //   // }
    //
    //
    //
    //   //Initialize PayPal
    //   $provider = \PayPal::setProvider();
    //   $provider->setApiCredentials(config('paypal'));
    //   $token = $provider->getAccessToken();
    //   $provider->setAccessToken($token);
    //
    //   $price = $order->total;
    //   $description => "Payment for Order Number: ".$order->id;
    //
    //   //Cretae Order
    //   $myorder = $provider->createOrder([
    //     "intent" => "CAPTURE",
    //     "purchase_units" => [
    //         [
    //             "amount" => [
    //               "currency_code" => "USD",
    //               "value" => $price
    //             ],
    //             "description" => $description
    //         ]
    //     ]
    //   ]);
    //
    //   return response()->json($myorder);
    //
    // }
    //
    // public function capture(Request $request)
    // {
    //   $data = json_decode($request->getContent(), true);
    //   $orderId = $data['orderId'];
    //
    //   //Initialize PayPal
    //   $provider = \PayPal::setProvider();
    //   $provider->setApiCredentials(config('paypal'));
    //   $token = $provider->getAccessToken();
    //   $provider->setAccessToken($token);
    //
    //   $result = $provider->capturePaymentOrder($orderId);
    //
    //   //Update Database
    //
    //   return response()->json($result);
    //}
}
