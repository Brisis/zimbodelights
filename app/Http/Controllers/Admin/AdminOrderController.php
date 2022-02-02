<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;
use App\Mail\OrderMail;
use App\Mail\OrderDelivered;
use App\Mail\OrderShipped;
use Mail;

class AdminOrderController extends Controller
{

  public function orders()
  {
    $orders = Order::paginate(5);

    return view('admin.order.orders', [
      'orders' => $orders
    ]);
  }

  public function order(Order $order)
  {
    return view('admin.order.order', [
      'order' => $order,
      'products' => $order->items
    ]);
  }

  public function editOrder(Order $order, Request $request)
  {
    $this->validate($request, [
        'status' => 'required'
    ]);

    $order->status = $request->status;

    if ($request->status == 'delivered') {
      $order->date_delivered = Carbon::today();
    }

    $order->save();

    if ($order->status == 'pending') {
      Mail::to($order->buyer_email)->send(new OrderMail($order));
    }

    if ($order->status == 'shipped') {
      Mail::to($order->buyer_email)->send(new OrderShipped($order));
    }

    if ($request->status == 'delivered') {
      Mail::to($order->buyer_email)->send(new OrderDelivered($order));
    }

    return redirect()->back();
  }
}
