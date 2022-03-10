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

class AdminCategoryController extends Controller
{
  public function categories()
  {
    $categories = Category::paginate(5);

    return view('admin.category.categories', [
      'categories' => $categories
    ]);
  }

  public function category(Category $category)
  {
    $products = Product::where('category_id', $category->id)->paginate(5);
    return view('admin.category.category', [
      'category' => $category,
      'products' => $products
    ]);
  }

  public function getAddCategory()
  {
    return view('admin.category.add-category');
  }

  public function addCategory(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|max:255',
      'image_path' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048'
    ]);

    $slug = Str::slug($request->name, '-');

    $image = $request->file('image_path');
    $filename = time().'.'.$image->getClientOriginalExtension();

    $destination = 'uploads/categories/'.$filename;
    $image->move(public_path('uploads/categories/'), $filename);

    Category::create([
      'name' => $request->name,
      'slug' => $slug,
      'picture' => $destination
    ]);

    $request->session()->flash('message', 'Category added Successfully.');

    return redirect()->route('admin.categories.categories');
  }

  public function updateCategory(Request $request, Category $category)
  {
    $this->validate($request, [
      'name' => 'required|max:255',
    ]);

    $category->name = $request->name;

    if ($request->file('image_path')) {

      $previous_path  = $category->picture;
      if(File::exists($previous_path)) {
          File::delete($previous_path);
      }

      $image = $request->file('image_path');
      $filename = time().'.'.$image->getClientOriginalExtension();

      $destination = 'uploads/categories/'.$filename;
      $image->move(public_path('uploads/categories/'), $filename);

      $category->picture = $destination;
    }

    $category->slug = Str::slug($request->name, '-');


    $category->save();

    $request->session()->flash('message', 'Category details changed.');

    return redirect()->back();
  }

  public function deleteCategory(Request $request, Category $category)
  {
    Category::where('id', $category->id)->delete();

    return redirect()->route('admin.categories.categories');
  }


}
