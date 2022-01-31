<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banner;
use App\Models\Deals;
use App\Models\Social;
use App\Models\Contact;
use App\Models\Newsletter;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{
    public function index (Request $request)
    {
      $contacts = Contact::get();
      $contact = $contacts->isNotEmpty() ? Contact::where('id', 1)->first() : null;

      $socials = Social::get();
      $social = $socials->isNotEmpty() ? Social::where('id', 1)->first() : null;

      $deals = Deals::get();
      $deal = $deals->isNotEmpty() ? Deals::where('id', 1)->first() : null;

      $banners = Banner::get();

      return view('admin.settings.settings', [
        'contact' => $contact,
        'social' => $social,
        'deal' => $deal,
        'banners' => $banners
      ]);
    }

    public function admin_setup()
    {
      $users = User::paginate(5);

      return view('admin.settings.users', [
        'users' => $users
      ]);
    }

    public function makeAdmin(Request $request)
    {
      $user = User::find($request->userId);

      if ($user->is_admin) {
        $user->is_admin = false;
        $user->save();
      }
      else {
        $user->is_admin = true;
        $user->save();
      }

      $request->session()->flash('message', 'Admin Status Successfully Changed.');

      return redirect()->back();
    }

    public function banners (Request $request)
    {
      $banners = Banner::get();

      return view('admin.settings.banners', [
        'banners' => $banners
      ]);
    }

    public function deals (Request $request)
    {
      $deals = Deals::get();
      $deal = $deals->isNotEmpty() ? Deals::get()->first() : null;

      return view('admin.settings.deals', [
        'deal' => $deal
      ]);
    }

    public function contact (Request $request)
    {
      $contacts = Contact::get();
      $contact = $contacts->isNotEmpty() ? Contact::get()->first() : null;

      return view('admin.settings.contacts', [
        'contact' => $contact
      ]);
    }

    public function socials (Request $request)
    {
      $socials = Social::get();
      $social = $socials->isNotEmpty() ? Social::get()->first() : null;

      return view('admin.settings.socials', [
        'social' => $social,
      ]);
    }

    public function addContact (Request $request)
    {
      $this->validate($request, [
        'phone' => 'required|max:255',
        'email' => 'required|max:255',
        'city' => 'required|max:255',
        'country' => 'required|max:255',
        'address_1' => 'required|max:255',
      ]);

      Contact::create([
        'phone' => $request->phone,
        'email' => $request->email,
        'city' => $request->city,
        'country' => $request->country,
        'address_1' => $request->address_1,
        'address_2' => $request->address_2,
        'post_code' => $request->post_code,
        'province' => $request->province,
        'google_maps_url' => $request->google_maps_url
      ]);

      $request->session()->flash('message', 'Contact details added Successfully.');

      return redirect()->back();
    }

    public function editContact(Request $request, Contact $contact)
    {
      $contact->phone = $request->phone ? $request->phone : $contact->phone;

      $contact->email = $request->email ? $request->email : $contact->email;

      $contact->city = $request->city ? $request->city : $contact->city;

      $contact->country = $request->country ? $request->country : $contact->country;

      $contact->address_1 = $request->address_1 ? $request->address_1 : $contact->address_1;

      $contact->address_2 = $request->address_2 ? $request->address_2 : $contact->address_2;

      $contact->post_code = $request->post_code ? $request->post_code : $contact->post_code;

      $contact->province = $request->province ? $request->province : $contact->province;

      $contact->google_maps_url = $request->google_maps_url ? $request->google_maps_url : $contact->google_maps_url;

      $contact->save();
      $request->session()->flash('message', 'Contact details updated.');

      return redirect()->back();
    }

    public function addSocials (Request $request)
    {
      $this->validate($request, [
        'facebook' => 'required|max:255',
        'twitter' => 'required|max:255',
        'instagram' => 'required|max:255',
        'whatsapp' => 'required|max:255',
      ]);

      Social::create([
        'facebook' => $request->facebook,
        'twitter' => $request->twitter,
        'instagram' => $request->instagram,
        'whatsapp' => $request->whatsapp
      ]);

      $request->session()->flash('message', 'Socials added Successfully.');

      return redirect()->back();
    }

    public function editSocials(Request $request, Social $social)
    {
      $social->facebook = $request->facebook ? $request->facebook : $social->facebook;

      $social->instagram = $request->instagram ? $request->instagram : $social->instagram;

      $social->twitter = $request->twitter ? $request->twitter : $social->twitter;

      $social->whatsapp = $request->whatsapp ? $request->whatsapp : $social->whatsapp;

      $social->save();
      $request->session()->flash('message', 'Socials updated Successfully.');

      return redirect()->back();
    }

    public function addDeals(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|max:255',
        'duration' => 'required|max:255',
        'image_path' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048'
      ]);

      $image = $request->file('image_path');
      $filename = time().'.'.$image->getClientOriginalExtension();

      $destination = 'uploads/deals/'.$filename;
      $image->move(public_path('uploads/deals/'), $filename);

      Deals::create([
        'name' => $request->name,
        'duration' => $request->duration,
        'image' => $destination
      ]);

      $request->session()->flash('message', 'Deals added Successfully.');

      return redirect()->back();
    }

    public function editDeals(Request $request, Deals $deal)
    {
      $deal->name = $request->name ? $request->name : $deal->name;

      $deal->duration = $request->duration ? $request->duration : $deal->duration;

      if ($request->file('image_path')) {

        $previous_path  = $deal->image;
        if(File::exists($previous_path)) {
            File::delete($previous_path);
        }

        $image = $request->file('image_path');
        $filename = time().'.'.$image->getClientOriginalExtension();

        $destination = 'uploads/deals/'.$filename;
        $image->move(public_path('uploads/deals/'), $filename);

        $deal->image = $destination;
      }

      $deal->save();
      $request->session()->flash('message', 'Deals updated Successfully.');

      return redirect()->back();
    }

    public function addBanner (Request $request)
    {
      $this->validate($request, [
        'url_link' => 'required|max:255',
        'image_path' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048'
      ]);

      $slug = Str::slug($request->name, '-');

      $image = $request->file('image_path');
      $filename = time().'.'.$image->getClientOriginalExtension();

      $destination = 'uploads/banners/'.$filename;
      $image->move(public_path('uploads/banners/'), $filename);

      Banner::create([
        'title' => $request->title,
        'subtitle' => $request->subtitle,
        'url_link' => $request->url_link,
        'image' => $destination
      ]);

      $request->session()->flash('message', 'Banner added Successfully.');

      return redirect()->back();
    }

    // Delete Controllers
    public function deleteDeals(Request $request, Deals $deal)
    {
      $previous_path  = $deal->image;
      if(File::exists($previous_path)) {
          File::delete($previous_path);
      }

      Deals::where('id', $deal->id)->delete();

      return redirect()->back();
    }

    public function deleteBanner(Request $request, Banner $banner)
    {
      $previous_path  = $banner->image;
      if(File::exists($previous_path)) {
          File::delete($previous_path);
      }

      Banner::where('id', $banner->id)->delete();

      return redirect()->back();
    }

}
