<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

class CheckoutController extends Controller
{

  public function checkout()
  {
    $temp_user = session()->get('temp_user');

    $cart = session()->get('cart');
    $subtotal = 0;
    $delivery = 10;

    if (!$cart) {
      return redirect()->route('cart');
    }

    foreach($cart as $product => $item) {
      $subtotal += $item['price'] * $item['quantity'];
    }

    $total = $subtotal + $delivery;

    return view('front.checkout.checkout', [
      'total' => $total,
      'temp_user' => $temp_user
    ]);
  }

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
    elseif (!$user) {
      if (!$temp_user) {
        $temp_user = [
          "name" => $request->buyer_name,
          "email" => $request->buyer_email,
          "address" => $request->buyer_address
        ];

        session()->put('temp_user', $temp_user);
      }
    }

    $cart = session()->get('cart');
    $subtotal = 0;
    $delivery = 10;

    foreach($cart as $product => $item) {
      $subtotal += $item['price'] * $item['quantity'];
    }

    $total = $subtotal + $delivery;

    $buyer_name = $user ? $user->name : $temp_user["name"];
    $buyer_email = $user ? $user->email : $temp_user["email"];
    $buyer_address = $user ? $user->address : $temp_user["address"];

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

    // $orderPayment = [
    //   'body' => 'You received a new test notification',
    //   'orderText' => 'Order has been sent',
    //   'url' => url('/'),
    //   'thankyou' => 'Your order will arrive in 10 days ',
    // ];
    //
    // Notification::send($admin, new InvoicePaid($orderPayment));


    $order->save();

    $request->session()->forget('cart');

    return redirect()->route('pay', $order);
  }

  public function pay(Order $order)
  {

    \Stripe\Stripe::setApiKey('sk_test_1bOuDMsPbava9TsLWgqd3V4e00m7Txp5wT');

    $session = \Stripe\Checkout\Session::create([
      'payment_method_types' => ['card'],
      'line_items' => [[
        'price_data' => [
          'currency' => 'usd',
          'product_data' => [
            'name' => 'ZimboDelights Order',
          ],
          'unit_amount' => $order->total * 100,
        ],
        'quantity' => 1,
      ]],
      'mode' => 'payment',
      'success_url' => route('checkout_done', $order),
      'cancel_url' => route('checkout'),
    ]);

    return view('front.checkout.pay', [
      'session' => $session
    ]);
  }

  public function checkoutDone(Order $order)
  {
    $order->is_paid = true;
    $order->save();

    $user = auth()->user();
    $admin = User::where('is_admin', true)->first();
    $temp_user = session()->get('temp_user');

    Mail::to($user ? $user->email : $temp_user['email'])->send(new OrderMail());

    Mail::to($admin->email)->send(new OrderMailAdmin($order));

    return view('front.checkout.checkout-done', [
      'order' => $order,
      'products' => $order->items
    ]);
  }
}
