<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
  public function index()
  {
      return view('front.account.profile');
  }

  public function orders()
  {
      $delivered = Order::where('is_paid', true)->where('user_id', auth()->user()->id)->where('status', 'delivered')->get();
      $pending = Order::where('is_paid', true)->where('user_id', auth()->user()->id)->where('status', 'pending')->orWhere('status', 'shipped')->get();

      return view('front.account.orders', [
        'delivered' => $delivered,
        'pending' => $pending
      ]);
  }

  public function order(Order $order)
  {

    return view('front.account.order-tracking', [
      'order' => $order,
      'products' => $order->items
    ]);
  }

  public function invoice(Order $order)
  {

    return view('front.account.invoice', [
      'order' => $order,
      'products' => $order->items
    ]);
  }

  public function settings()
  {
       return view('front.account.profile-setting');
  }

  public function editDetails()
  {
       return view('front.settings.edit-details');
  }

  public function updateDetails(Request $request)
  {
    $user = auth()->user();

    $this->validate($request, [
      'name' => 'required',
      'address' => 'required',
      'city' => 'required',
      'zipcode' => 'required',
      'phone' => 'required',
      'image_path' => 'image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048'
    ]);

    $user->name = $request->name;
    $user->address = $request->address;
    $user->city = $request->city;
    $user->country = $request->country ? $request->country : $user->country;
    $user->zipcode = $request->zipcode;
    $user->phone = $request->phone;

    if ($request->file('image_path')) {

      $previous_path  = $user->profile_picture;
      if(File::exists($previous_path)) {
          File::delete($previous_path);
      }

      $image = $request->file('image_path');
      $filename = time().'.'.$image->getClientOriginalExtension();

      $destination = 'uploads/profile/'.$filename;
      $image->move(public_path('uploads/profile/'), $filename);

      $user->profile_picture = $destination;
    }

    $user->save();

    $request->session()->flash('message', 'Account Details Updated Successfully.');

    return redirect()->back();
  }

  public function editPicture()
  {
       return view('front.settings.edit-picture');
  }

  /*public function updatePicture(Request $request)
  {
    if ($request->hasFile('image')) {
       User::uploadAvatar($request->image);
       $request->session()->flash('message', 'Account Picture Uploaded.');
    }

    return redirect()->back();
  }*/

  public function updatePicture(Request $request)
  {
      $this->validate($request, [
          'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:5048',
      ]);

      $image = $request->file('image');
      $filename = time().'.'.$image->getClientOriginalExtension();

      $image_resize = Image::make($image->getRealPath());
      $image_resize->fit(300, 300, function($constraint) {
        $constraint->aspectRatio();
      });

      $destination = 'uploads/thumbnails/'.$filename;

      $image_resize->save(public_path($destination), 100);

      //$image->storeAs('uploads', $filename, 'public');
      $user = auth()->user();
      $user->profile_picture = $destination;

      $user->save();

      $request->session()->flash('message', 'Account Picture Uploaded.');

      return redirect()->back();
  }

  public function destroy($id)
  {
      //
  }
}
