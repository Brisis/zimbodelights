<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;
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

    if (!$cart) {
      return redirect()->route('cart');
    }

    foreach($cart as $product => $item) {
      $a_product = Product::find($item['item_id']);
      if ($a_product->stock == 1) {
        if(isset($cart[$item['item_id']])) {
            unset($cart[$item['item_id']]);
            session()->put('cart', $cart);

            $request->session()->flash('message', $a_product->name.' is out of Stock');
            return redirect()->back();
        }
      }
    }

    return view('front.checkout.checkout', [
      'temp_user' => $temp_user
    ]);
  }

  public function createOrder(Request $request)
  {
    $user = auth()->user();
    $admin = User::where('email', 'admin@zimbodelights.com')->first();
    $temp_user = session()->get('temp_user');

    if ($user) {
      if (!$user->address) {
        $request->session()->flash('add_address', "");
        return redirect()->back();
      }
    }

    $cart = session()->get('cart');

    $subtotal = $request->subtotal;
    $weight = $request->weight;

    $delivery_fees = 0;

    $del_method = $request->delivery_method;

    if ($weight < 1000) {
      if ($del_method == 'standard') {
        $total = $subtotal + 3.67;
        $delivery_fees = 3.67;
      }
      if ($del_method == 'nextday') {
        $total = $subtotal + 4.06;
        $delivery_fees = 4.06;
      }
    }
    elseif ($weight >= 1000 && $weight <= 2000) {
      if ($del_method == 'standard') {
        $total = $subtotal + 5.12;
        $delivery_fees = 5.12;
      }
      if ($del_method == 'nextday') {
        $total = $subtotal + 5.50;
        $delivery_fees = 5.50;
      }
    }
    elseif ($weight > 2000 && $weight <= 5000) {
      if ($del_method == 'standard') {
        $total = $subtotal + 6.64;
        $delivery_fees = 6.64;
      }
      if ($del_method == 'nextday') {
        $total = $subtotal + 6.90;
        $delivery_fees = 6.90;
      }
    }
    elseif ($weight > 5000 && $weight <= 10000) {
      if ($del_method == 'standard') {
        $total = $subtotal + 7.82;
        $delivery_fees = 7.82;
      }
      if ($del_method == 'nextday') {
        $total = $subtotal + 8.08;
        $delivery_fees = 8.08;
      }
    }
    else {
      if ($del_method == 'standard') {
        $total = $subtotal + 9.44;
        $delivery_fees = 9.44;
      }
      if ($del_method == 'nextday') {
        $total = $subtotal + 9.71;
        $delivery_fees = 9.71;
      }
    }


    $buyer_name = $user ? $user->name : $request->buyer_name;
    $buyer_email = $user ? $user->email : $request->buyer_email;
    $buyer_address = $user ? $user->address : $request->buyer_address;
    $buyer_city = $user ? $user->city : $request->city;
    $buyer_country = $user ? $user->country : $request->country;
    $buyer_zipcode = $user ? $user->zipcode : $request->zipcode;
    $buyer_phone = $user ? $user->phone : $request->phone;

    $date_ordered = Carbon::today();
    $combinedId = $buyer_name .' '. $buyer_address .' '. $date_ordered;
    $slug = Str::slug($combinedId, '-');

    $order = Order::create([
      'user_id' => $user ? $user->id : $admin->id,
      'slug' => $slug,
      'buyer_name' => $buyer_name,
      'buyer_email' => $buyer_email,
      'buyer_address' => $buyer_address,
      'buyer_city' => $buyer_city,
      'buyer_country' => $buyer_country,
      'buyer_zipcode' => $buyer_zipcode,
      'buyer_phone' => $buyer_phone,
      'delivery_method' => $request->delivery_method,
      'delivery_fees' => $delivery_fees,
      'total' => $total
    ]);

    foreach($cart as $product => $item) {
      $a_product = Product::find($item['item_id']);

      $order->items()->create([
              'product_id'    =>  $a_product->id,
              'product_name'    =>  $a_product->name,
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
        "address" => $request->buyer_address,
        "city" => $request->city,
        "country" => $request->country,
        "zipcode" => $request->zipcode,
        "phone" => $request->phone
      ];

      session()->put('temp_user', $temp_user);
    }

    return redirect()->route('checkout');
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

    // $email = '';
    // if ($user) {
    //   $email = $user->email;
    // }
    // elseif ($temp_user && !$user) {
    //   $email = $temp_user['email'];
    // }
    // else {
    //   return redirect()->route('signin');
    // }
    //
    // if ($email) {
    //   if ($order->buyer_email != $email) {
    //     return redirect()->route('home');
    //   }
    // }


    return view('front.checkout.checkout-prev', [
      'order' => $order,
      'products' => $order->items
    ]);
  }

}
