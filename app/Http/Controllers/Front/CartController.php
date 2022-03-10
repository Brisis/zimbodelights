<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{
  public function cart()
  {
    return view('front.checkout.cart');
  }

  public function addToCart(Request $request, $id)
  {
      $product = Product::find($id);
      if(!$product) {
          abort(404);
      }

      if ($product->stock == 1) {
        $request->session()->flash('message', 'Product out of Stock');
        return redirect()->route('cart');
      }

      $cart = session()->get('cart');
      // if cart is empty then this the first product
      if(!$cart) {
          $cart = [
                  $id => [
                      "item_id" => $product->id,
                      "name" => $product->name,
                      "quantity" => 1,
                      "price" => $product->price,
                      "weight" => $product->weight,
                      "slug" => $product->slug,
                      "image" => $product->image
                  ]
          ];

          $request->session()->flash('message', 'Product added to cart successfully!');
          session()->put('cart', $cart);
          return redirect()->back();
      }
      // if cart not empty then check if this product exist then increment quantity
      if(isset($cart[$id])) {
          $cart[$id]['quantity']++;

          $a_product = Product::find($cart[$id]['item_id']);
          if ($cart[$id]['quantity'] >= $a_product->stock) {
            $stock = $a_product->stock - 1;
            $request->session()->flash('message', 'Only '.$stock.' remaining in stock and available for purchase.');
            return redirect()->route('cart');
          }

          $cart[$id]['weight'] = $cart[$id]['quantity'] * $a_product->weight;
          session()->put('cart', $cart);
          return redirect()->back()->with('message', 'Product added to cart successfully!');
      }
      // if item not exist in cart then add to cart with quantity = 1
      $cart[$id] = [
          "item_id" => $product->id,
          "name" => $product->name,
          "quantity" => 1,
          "price" => $product->price,
          "weight" => $product->weight,
          "slug" => $product->slug,
          "image" => $product->image
      ];
      session()->put('cart', $cart);
      return redirect()->back()->with('message', 'Product added to cart successfully!');
  }

  public function update(Request $request)
  {
      if($request->id and $request->quantity)
      {
          $cart = session()->get('cart');

          $cart[$request->id]["quantity"] = $request->quantity;

          $a_product = Product::find($cart[$request->id]['item_id']);
          if ($request->quantity >= $a_product->stock) {
            $stock = $a_product->stock - 1;
            $request->session()->flash('message', 'Only '.$stock.' remaining in stock and available for purchase.');
            return redirect()->route('cart');
          }

          $cart[$request->id]["weight"] = $request->quantity * $a_product->weight;

          session()->put('cart', $cart);

          session()->flash('message', 'Cart updated successfully');
      }
  }

  public function remove(Request $request)
  {
      if($request->id) {

          $cart = session()->get('cart');

          if(isset($cart[$request->id])) {

              unset($cart[$request->id]);

              session()->put('cart', $cart);
          }

          session()->flash('message', 'Product removed successfully');
      }
  }

  public function removeAll(Request $request)
  {
      if($request->session()->has('cart')) {
          $request->session()->forget('cart');

          session()->flash('message', 'Products removed successfully');
      }

      return redirect()->back();
  }


}
