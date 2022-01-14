<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
Use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

use App\Http\Controllers\Front\FrontDashboardController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\UserController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\SettingsController;

//Front End Routes

//Authentication
Route::get('/signup', [RegisterController::class, 'index'])->name('signup');
Route::post('/signup', [RegisterController::class, 'store']);

Route::get('/signin', [LoginController::class, 'index'])->name('signin');
Route::post('/signin', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


//Site
Route::get('/', [FrontDashboardController::class, 'index'])->name('home');
Route::get('/deals', [FrontDashboardController::class, 'deals'])->name('deals');
Route::get('/about', [FrontDashboardController::class, 'about'])->name('about');
Route::get('/contact', [FrontDashboardController::class, 'contact'])->name('contact');
Route::get('/terms-and-conditions', [FrontDashboardController::class, 'terms'])->name('terms');


//Product Routes
Route::get('/search/', [ProductController::class, 'search'])->name('search');
Route::get('/product/{product:slug}', [ProductController::class, 'product'])->name('product');
Route::middleware('auth')->post('/add_review/{product}', [ProductController::class, 'addReview'])->name('add_review');

Route::post('/subscribed', [FrontDashboardController::class, 'subscribe'])->name('subscribe');

//Category Routes
Route::group([
  'prefix' => 'categories',
  'as' => 'categories.'
],
function()
{
  // Route::get('/', [CategoryController::class, 'categories'])->name('categories');

  Route::get('/{category:slug}', [CategoryController::class, 'category'])->name('category');
}
);


//Cart Routes
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart']);
Route::patch('update-cart', [CartController::class, 'update']);
Route::delete('remove-from-cart', [CartController::class, 'remove']);
Route::post('remove-all-from-cart', [CartController::class, 'removeAll'])->name('remove_all');


//Checkout Routes
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/create_order', [CheckoutController::class, 'createOrder'])->name('create_order');

Route::get('/{order}/pay', [CheckoutController::class, 'pay'])->name('pay');
// Route::post('/pay', [CheckoutController::class, 'pay']);

Route::get('/{order}/checkout_done', [CheckoutController::class, 'checkoutDone'])->name('checkout_done');


//Permanent Buyer Routes
Route::group([
  'prefix' => 'buyer',
  'as' => 'buyer.',
  'middleware' => 'auth'
],
function()
{
  Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
  Route::get('/orders', [UserController::class, 'orders'])->name('orders');
  Route::get('/order/{order}', [UserController::class, 'order'])->name('order');

  Route::get('/invoice/{order}', [UserController::class, 'invoice'])->name('invoice');

  Route::get('/settings', [UserController::class, 'settings'])->name('settings');

  Route::post('/update_account', [UserController::class, 'updateDetails'])->name('update_account');
}
);

//Temporary Buyer Routes



//Back End Controller Routes
Route::group([
  'prefix' => 'admin',
  'as' => 'admin.',
  'middleware' => 'is_admin'
],
function(){
    //Site Routes
    Route::get('/dashboard', [AdminDashboardController::class,'index'])->name("dashboard");



    //Category Routes
    Route::group([
    'as' => 'categories.',
    'prefix' => 'categories'
    ], function () {
      Route::get('/', [AdminCategoryController::class,'categories'])->name("categories");
      Route::get('/category/{category}', [AdminCategoryController::class,'category'])->name("category");
      Route::post('/category/{category}', [AdminCategoryController::class,'updateCategory']);
      Route::get('/add_category', [AdminCategoryController::class,'getAddCategory'])->name("add_category");
      Route::post('/add_category', [AdminCategoryController::class,'addCategory']);
    });



    //Product Routes
    Route::group([
    'as' => 'products.',
    'prefix' => 'products'
    ], function () {
      Route::get('/', [AdminProductController::class,'products'])->name("products");
      Route::get('/add', [AdminProductController::class,'getAddProduct'])->name("add_product");
      Route::post('/add', [AdminProductController::class,'addProduct']);
      Route::get('/{product}/add_images', [AdminProductController::class,'getAddProductImages'])->name("add_product_images");
      Route::post('/{product}/add_images', [AdminProductController::class,'addProductImages']);
      Route::post('/{image}/delete_image', [AdminProductController::class,'deleteImage'])->name("delete_image");
      Route::get('/product/{product}', [AdminProductController::class,'getProduct'])->name("product");
      Route::post('/{product}/edit_product', [AdminProductController::class,'editProduct'])->name("edit_product");
      Route::post('/{product}/edit_status', [AdminProductController::class,'editProductStatus'])->name("edit_status");
      Route::delete('/{product}/delete_product', [AdminProductController::class,'deleteProduct'])->name("delete_product");
      Route::post('/{product}/make_public', [AdminProductController::class,'makePublic'])->name('make_public');
      Route::post('/{product}/make_draft', [AdminProductController::class,'makeDraft'])->name('make_draft');
    });



    //Orders Routes
    Route::group([
    'as' => 'orders.',
    'prefix' => 'orders'
    ], function () {
      Route::get('/', [AdminOrderController::class,'orders'])->name("orders");
      Route::get('/order/{order}', [AdminOrderController::class,'order'])->name("order");
      Route::post('/edit_order/{order}', [AdminOrderController::class,'editOrder'])->name("edit_order");
    });



    //Settings Routes
    Route::group([
    'as' => 'settings.',
    'prefix' => 'settings'
    ], function () {
      Route::get('/', [SettingsController::class,'index'])->name("settings");

      Route::get('/newsletter', [SettingsController::class,'newsletter'])->name("newsletter");

      //Add
      Route::get('/add_contact', [SettingsController::class,'contact'])->name("add_contact");
      Route::post('/add_contact', [SettingsController::class,'addContact']);

      Route::get('/add_socials', [SettingsController::class,'socials'])->name("add_socials");
      Route::post('/add_socials', [SettingsController::class,'addSocials']);

      Route::get('/add_deals', [SettingsController::class,'deals'])->name("add_deals");
      Route::post('/add_deals', [SettingsController::class,'addDeals']);

      Route::get('/add_banner', [SettingsController::class,'banners'])->name("add_banner");
      Route::post('/add_banner', [SettingsController::class,'addBanner']);

      //Update
      Route::post('/edit_contact/{contact}', [SettingsController::class,'editContact'])->name("edit_contact");
      Route::post('/edit_socials/{social}', [SettingsController::class,'editSocials'])->name("edit_socials");
      Route::post('/edit_deal/{deal}', [SettingsController::class,'editDeals'])->name("edit_deal");


      Route::delete('/{deal}/delete_deals', [SettingsController::class,'deleteDeals'])->name("delete_deals");
      Route::delete('/{banner}/delete_banner', [SettingsController::class,'deleteBanner'])->name("delete_banner");
    });

});
