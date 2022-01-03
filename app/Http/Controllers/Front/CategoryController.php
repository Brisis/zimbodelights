<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class CategoryController extends Controller
{
  public function categories()
  {
    $categories = Category::latest()->paginate(10);

    return view('front.category.categories', [
      'categories' => $categories
    ]);
  }

  public function category(Category $category)
  {
    return view('front.category.category', [
      'category' => $category,
      'products' => $category->products->where('is_draft', false)
    ]);
  }
}
