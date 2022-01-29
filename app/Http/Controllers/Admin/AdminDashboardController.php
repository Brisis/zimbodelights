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

class AdminDashboardController extends Controller
{
  public function index()
  {
    $orders = Order::get();
    $shipped = Order::where('status', 'shipped')->get();
    $delivered = Order::where('status', 'delivered')->get();

    $sales = 0;
    foreach ($orders as $order) {
      if ($order->is_paid) {
        $sales += $order->total;
      }
    }


    return view('admin.index', [
      'orders' => count($orders),
      'shipped' => count($shipped),
      'delivered' => count($delivered),
      'sales' => $sales
    ]);
  }

  public function reviews()
  {
    return view('admin.settings.reviews');
  }

  public function sellers()
  {
    return view('admin.directory.sellers');
  }

  public function settings()
  {
    return view('admin.settings.settings');
  }

  public function transactions()
  {
    return view('admin.tools.transactions');
  }
}
