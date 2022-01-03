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

    $user->name = $request->name;
    $user->address = $request->address;

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

  public function editAddress()
  {
       return view('front.settings.edit-address');
  }

  public function addAddress(Request $request)
  {

    $this->validate($request, [
      'country' => 'required|max:255',
      'city' => 'required|max:255',
      'phone' => 'required|string|max:255',
      'shipping' => 'required|max:255'
    ]);

    $request->user()->addresses()->create([
      'country' => $request->country,
      'city' => $request->city,
      'phone' => $request->phone,
      'shipping' => $request->shipping
    ]);

    $request->session()->flash('message', 'Account Addresses Added Successfully.');

    return redirect()->back();
  }

  public function updateAddress(Request $request)
  {
    $this->validate($request, [
      'city' => 'required|max:255',
      'phone' => 'required|string|max:255',
      'shipping' => 'required|max:255'
    ]);

    $request->user()->addresses()->update([
      'country' => $request->country ? $request->country : auth()->user()->addresses->country,
      'city' => $request->city,
      'phone' => $request->phone,
      'shipping' => $request->shipping
    ]);

    $request->session()->flash('message', 'Account Addresses Updated Successfully.');

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

  public function addVerification()
  {
       return view('front.settings.verify');
  }

  public function verify(Request $request)
  {

    $this->validate($request, [
      'email' => 'required|max:255',
      'purpose' => 'required',
      'identification' => 'required'
    ]);

    $image = $request->file('identification');
    $filename = time().'.'.$image->getClientOriginalExtension();

    $destination = 'uploads/verification/'.$filename;
    $image->move(public_path('uploads/verification/'), $filename);

    auth()->user()->verifications()->create([
      'email' => $request->email,
      'purpose' => $request->purpose,
      'identification' => $destination
    ]);

    $request->session()->flash('message', 'Account waiting Verification');

    return redirect()->route('account.dashboard');
  }

  public function destroy($id)
  {
      //
  }
}
