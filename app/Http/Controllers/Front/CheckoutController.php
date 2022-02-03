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
use Mail;

class CheckoutController extends Controller
{

  public function checkout(Request $request)
  {
    $temp_user = session()->get('temp_user');

    $user = auth()->user();
    if ($user) {
      if (!$user->address || !$user->city || !$user->country || !$user->phone || !$user->zipcode) {
        $request->session()->flash('missing', "Please Complete your Profile Details");
        return redirect()->route('buyer.settings');//back();
      }
    }

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
    $admin = User::where('email', 'admin@zimbodelights.com')->first();
    $temp_user = session()->get('temp_user');

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
      'delivery_method' => $request->delivery_method,
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

    $curr_order = session()->get('curr_order');
    $curr_order = $order;
    session()->put('curr_order', $curr_order);

    $order->is_paid = true;
    $order->save();

    if (!$user && !$temp_user) {
      $temp_user = [
        "name" => $request->buyer_name,
        "email" => $request->buyer_email,
        "address" => $request->buyer_address
      ];

      session()->put('temp_user', $temp_user);
    }

    return redirect()->route('checkout_done');
  }

  public function resetDetails(Request $request)
  {
    $request->session()->forget('temp_user');
    $request->session()->forget('curr_order');

    return redirect()->back();
  }

  public function resetCheckout(Request $request)
  {
    $request->session()->forget('temp_user');

    $curr_order = session()->get('curr_order');

    $order = Order::where('id', $curr_order->id)->delete();

    $request->session()->forget('curr_order');

    return redirect()->back();
  }

  public function checkoutDone(Request $request)
  {
    $user = auth()->user();
    $admin = User::where('email', 'admin@zimbodelights.com')->first();
    $temp_user = session()->get('temp_user');

    $curr_order = session()->get('curr_order');
    if (!$curr_order) {
      return redirect()->route('home');
    }

    $order = Order::find($curr_order->id);
    if (!$order) {
      return redirect()->route('home');
    }

    $request->session()->forget('curr_order');

    // Mail::to($user ? $user->email : $temp_user['email'])->send(new OrderMail($order));
    //
    // Mail::to("admin@zimbodelights.com")->send(new OrderMailAdmin($order));

    return view('front.checkout.checkout-done', [
      'order' => $order,
      'products' => $order->items
    ]);
  }

  public function checkoutPrev(Request $request, Order $order)
  {
    $user = auth()->user();
    $temp_user = session()->get('temp_user');

    if (!$order) {
      return redirect()->route('home');
    }

    $email = '';
    if ($user) {
      $email = $user->email;
    }
    elseif ($temp_user && !$user) {
      $email = $temp_user['email'];
    }
    else {
      return redirect()->route('signin');
    }

    if ($email) {
      if ($order->buyer_email != $email) {
        return redirect()->route('home');
      }
    }


    return view('front.checkout.checkout-prev', [
      'order' => $order,
      'products' => $order->items
    ]);
  }

}
