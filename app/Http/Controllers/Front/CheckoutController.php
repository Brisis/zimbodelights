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

  public function checkout(Request $request)
  {
    $temp_user = session()->get('temp_user');

    $user = auth()->user();
    if ($user) {
      if (!$user->address) {
        $request->session()->flash('add_address', "");
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
    $admin = User::where('is_admin', true)->first();
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

    return redirect()->back();
  }

  public function checkoutDone(Request $request)
  {
    $user = auth()->user();
    $admin = User::where('is_admin', true)->first();
    $temp_user = session()->get('temp_user');

    $curr_order = session()->get('curr_order');
    $order = Order::find($curr_order ? $curr_order->id : 5);
    //$request->session()->forget('curr_order');
    // Mail::to($user ? $user->email : $temp_user['email'])->send(new OrderMail());
    //
    // Mail::to($admin->email)->send(new OrderMailAdmin($order));

    return view('front.checkout.checkout-done', [
      'order' => $order,
      'products' => $order->items
    ]);
  }
}