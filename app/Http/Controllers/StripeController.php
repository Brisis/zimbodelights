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
use Illuminate\Http\Request;
use Mail;
use Stripe;

class StripeController extends Controller
{
  public function pay(Request $request)
  {
    $temp_user = session()->get('temp_user');
    $user = auth()->user();

    $curr_order = session()->get('curr_order');
    $order = Order::find($curr_order->id);

    $this->validate($request, [
      'cardnumber' => 'required|numeric',
      'expirymonth' => 'required|numeric',
      'expiryyear' => 'required|numeric',
      'cvc' => 'required|numeric'
    ]);

    $stripe = Stripe::make(env('STRIPE_KEY'));

    // dd($stripe->tokens);

    try {
      $token = Stripe::tokens()->create([
        'card' => [
          'number' => $request->cardnumber,
          'exp_month' => $request->expirymonth,
          'exp_year' => $request->expiryyear,
          'cvc' => $request->cvc,
        ]
      ]);

      if (!isset($token['id'])) {
        session()->flash('stripe_error', 'The stripe token was not generated correctly!');
        return redirect()->back();
      }

      $customer = Stripe::customers()->create([
        'name' => $user ? $user->name : $temp_user['name'],
        'email' => $user ? $user->email : $temp_user['email'],
        'address'=> [
          'line1' => $user ? $user->address : $temp_user['address'],
        ],
        'shipping' => [
          'name' => $user ? $user->name : $temp_user['name'],
          'address' => [
            'line1' => $user ? $user->address : $temp_user['address'],
          ]
        ],
        'source' => $token['id']
      ]);

      $charge = Stripe::charges()->create([
        'customer' => $customer['id'],
        'currency' => 'GBP',
        'amount' => $order->total,
        'description' => 'Payment for order no: ' . $order->id
      ]);

      if ($charge['status'] == 'succeeded') {
        $order->is_paid = true;
        $order->payment_method = 'Stripe/VisaCard/Mastercard';
        $order->save();

        Mail::to($user ? $user->email : $temp_user['email'])->send(new OrderMail($order));

        Mail::to("admin@zimbodelights.com")->send(new OrderMailAdmin($order));

        $cart = session()->get('cart');

        foreach($cart as $product => $item) {
          $a_product = Product::find($item['item_id']);

          $a_product->stock -= $item['quantity'];
          $a_product->save();
        }

        $request->session()->forget('cart');
      }
      else {
        session()->flash('stripe_error', 'Error in Transaction!');
        return redirect()->back();
      }
    }
    catch(Exception $e){
      session()->flash('stripe_error', $e->getMessage());
      return redirect()->back();
    }

    return redirect()->route('checkout_done');
  }
}
