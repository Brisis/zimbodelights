<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;

class ProductController extends Controller
{
  public function product(Product $product)
  {
    if ($product->is_draft) {
      return redirect()->route('home');
    }

    $products = Product::where('category_id', $product->category->id)
    ->where('is_draft', false)
    ->whereNotIn('id',[$product->id])
    ->paginate(3);

    $avgRating = $product->reviews->avg('rating');

    //dd($product->reviews);

    return view('front.product.product', [
      'product' => $product,
      'images' => $product->images,
      'products' => $products,
      'reviews' => $product->reviews,
      'avgRating' => $avgRating
    ]);
  }

  public function search(Request $request)
  {
    $search = $request->search ? $request->search : 'no search term';

    $products = Product::query()
      ->where('name', 'LIKE', "%{$search}%")
      ->orWhere('description', 'LIKE', "%{$search}%")
      ->paginate(10);

    return view('front.product.search', [
      'products' => $products->where('is_draft', false),
      'searchQry' => $search
    ]);
  }

  public function searchProduct(Product $product)
  {
    return view('front.product.product', [
      'product' => $product,
      'images' => $product->images,
      'products' => $products
    ]);
  }

  public function addReview(Request $request, Product $product)
  {
    $this->validate($request, [
      'rating' => 'required',
      'description' => 'required'
    ]);

    $review = $request->user()->reviews()->create([
      'product_id' => $product->id,
      'rating' => $request->rating,
      'description' => $request->description
    ]);

    return redirect()->back();
  }
}
