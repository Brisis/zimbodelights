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
    $weight = 0;

    $delivery_fees = 0;

    foreach($cart as $product => $item) {
      $subtotal += $item['price'] * $item['quantity'];
      $weight += $item['weight'] * $item['quantity'];
    }

    $del_method = $request->delivery_method;

    if ($weight < 1000) {
      if ($del_method == 'standard') {
        $total = $subtotal + 3.67;
        $delivery_fees = 3.67;
      }
      if ($del_method == 'nextday') {
        $total = $subtotal + 3.55;
        $delivery_fees = 3.55;
      }
    }
    elseif ($weight >= 1000 && $weight <= 2000) {
      if ($del_method == 'standard') {
        $total = $subtotal + 4.40;
        $delivery_fees = 4.40;
      }
      if ($del_method == 'nextday') {
        $total = $subtotal + 5.00;
        $delivery_fees = 5.00;
      }
    }
    elseif ($weight > 2000 && $weight <= 5000) {
      if ($del_method == 'standard') {
        $total = $subtotal + 6.64;
        $delivery_fees = 6.64;
      }
      if ($del_method == 'nextday') {
        $total = $subtotal + 6.40;
        $delivery_fees = 6.40;
      }
    }
    elseif ($weight > 5000 && $weight <= 10000) {
      if ($del_method == 'standard') {
        $total = $subtotal + 7.82;
        $delivery_fees = 7.82;
      }
      if ($del_method == 'nextday') {
        $total = $subtotal + 7.58;
        $delivery_fees = 7.58;
      }
    }
    else {
      if ($del_method == 'standard') {
        $total = $subtotal + 9.44;
        $delivery_fees = 9.44;
      }
      if ($del_method == 'nextday') {
        $total = $subtotal + 9.20;
        $delivery_fees = 9.20;
      }
    }


    $buyer_name = $user ? $user->name : $request->buyer_name;
    $buyer_email = $user ? $user->email : $request->buyer_email;
    $buyer_address = $user ? $user->address : $request->buyer_address;

    $order = Order::create([
      'user_id' => $user ? $user->id : $admin->id,
      'buyer_name' => $buyer_name,
      'buyer_email' => $buyer_email,
      'buyer_address' => $buyer_address,
      'delivery_method' => $request->delivery_method,
      'delivery_fees' => $delivery_fees,
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
                        "currency_code" => "GBP",
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
          $order->payment_method = 'PayPal';
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
