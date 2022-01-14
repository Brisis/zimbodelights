<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Newsletter;
use App\Models\Banner;
use App\Models\Social;
use App\Models\Deals;

class FrontDashboardController extends Controller
{
    public function index()
    {
      $categories = Category::paginate(8);
      $deals = Product::where([['is_draft', false], ['is_deal', true]])->latest()->paginate(3);
      $trending = Product::where([['is_draft', false], ['is_trending', true]])->latest()->paginate(9);
      $topicks = Product::where([['is_draft', false], ['is_top', true]])->latest()->paginate(9);
      $specials = Product::where([['is_draft', false], ['is_special', true]])->latest()->paginate(9);


      $banners = Banner::paginate(5);
      $deal = Deals::get()->first();
      $socials = Social::get()->first();

      $foodies = Product::where([['is_draft', false], ['is_foodies', true]])->latest()->paginate(9);

      $footer_categories = session()->get('footer_categories');
      if(!$footer_categories) {
          $footer_categories = $categories;
          session()->put('footer_categories', $footer_categories);
      }

      $footer_socials = session()->get('footer_socials');
      if(!$footer_socials) {
          $footer_socials = $socials;
          session()->put('footer_socials', $footer_socials);
      }

      return view('front.index', [
        'categories' => $categories,
        'deal' => $deal,
        'deals' => $deals,
        'trending' => $trending,
        'topicks' => $topicks,
        'specials' => $specials,
        'banners' => $banners,
        'socials' => $socials,
        'foodies' => $foodies
      ]);
    }

    public function deals()
    {
      $deals = Product::where([['is_draft', false], ['is_deal', true]])->latest()->paginate(10);

      return view('front.product.shop', [
        'products' => $deals
      ]);
    }

    public function about()
    {
      return view('front.website.about');
    }

    public function contact()
    {
      return view('front.website.contact');
    }

    public function terms()
    {
      return view('front.website.terms');
    }

    public function subscribe(Request $request)
    {
      $this->validate($request, [
        'email' => 'required|max:255',
      ]);

      $newsletter = Newsletter::create([
        'email' => $request->email,
      ]);

      // $admin = User::where('is_admin', true)->first();
      //
      // Mail::to($admin->email)->send(new NewsletterMail($newsletter));

      return view('front.website.subscribed');
    }
}
