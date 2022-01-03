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

class AdminProductController extends Controller
{

  public function products()
  {
    $products = Product::paginate(5);

    return view('admin.product.products', [
      'products' => $products
    ]);
  }

  public function getProduct(Product $product)
  {

    return view('admin.product.product', [
      'product' => $product,
      'images' => $product->images
    ]);
  }

  public function editProduct(Request $request, Product $product)
  {
    $product->name = $request->name ? $request->name : $product->name;

    $product->slug = $request->name ? Str::slug($request->name, '-') : $product->slug;

    $product->price = $request->price ? $request->price : $product->price;

    $product->discount = $request->discount ? $request->discount : null;

    $product->stock = $request->stock ? $request->stock : $product->stock;

    $product->description = $request->description ? $request->description : $product->description;

    $product->save();
    $request->session()->flash('edit_done', 'Product details updated.');

    return redirect()->back();
  }

  public function editProductStatus(Request $request, Product $product)
  {
    $this->validate($request, [
      'status' => 'required'
    ]);

    if ($request->status == 'is_deal') {
      $product->is_deal = true;
    }
    elseif ($request->status == 'is_trending') {
      $product->is_trending = true;
    }
    elseif ($request->status == 'is_top') {
      $product->is_top = true;
    }
    elseif ($request->status == 'is_special') {
      $product->is_special = true;
    }
    else {
      $product->is_deal = false;
      $product->is_trending = false;
      $product->is_top = false;
      $product->is_special = false;
    }

    $product->save();
    $request->session()->flash('edit_status', 'Product status updated.');

    return redirect()->back();
  }

  public function makePublic(Request $request, Product $product)
  {
    if ($product->is_draft && $product->stock >= 1 && count($product->images) >= 1) {
      $product->is_draft = false;
      if ($product->category->name == 'Biscuits' || $product->category->name == 'Snacks') {
        $product->is_foodies = true;
      }
      $product->save();

      $request->session()->flash('message', 'Product Successfully Published.');

      return redirect()->back();
    }

    $request->session()->flash('warning', 'Add atleast 1 image and inventory to make public.');

    return redirect()->back();
  }

  public function makeDraft(Request $request, Product $product)
  {
    $product->is_draft = true;
    $product->save();

    $request->session()->flash('message', 'Product saved to Draft.');

    return redirect()->back();
  }

  public function deleteProduct(Request $request, Product $product)
  {
    $orders = OrderItem::where('product_id', $product->id)->get();
    if (count($orders) == 0) {
      $images = $product->images;

      foreach ($images as $image) {
        $image_path  = $image->thumbnail;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        Image::where('id', $image->id)->delete();
      }

      Product::where('id', $product->id)->delete();
      $request->session()->flash('message', 'Product deleted Successfully.');
    }
    else {
      $request->session()->flash('warning', 'Product cannot be Deleted.');
    }

    return redirect()->route('admin.products.products');
  }

  public function getAddProduct()
  {
    $categories = Category::all();

    return view('admin.product.product-add', [
      'categories' => $categories
    ]);
  }

  public function addProduct(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|max:255',
      'price' => 'required|max:255',
      'category' => 'required|max:255',
      'stock' => 'required|max:255',
    ]);

    $slug = Str::slug($request->name, '-');

    $product = $request->user()->products()->create([
      'name' => $request->name,
      'category_id' => $request->category,
      'slug' => $slug,
      'price' => $request->price,
      'stock' => $request->stock,
      'discount' => $request->discount ? $request->discount : null,
      'description' => $request->description ? $request->description : 'Not Available'
    ]);

    return redirect()->route('admin.products.add_product_images', $product);
  }

  public function getAddProductImages(Product $product)
  {
    return view('admin.product.product-add-images', [
      'product' => $product,
      'images' => $product->images
    ]);
  }

  public function addProductImages(Request $request, Product $product)
  {
    $this->validate($request, [
        'image_path' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048'
      ]);

      $image = $request->file('image_path');
      $filename = time().'.'.$image->getClientOriginalExtension();

      $destination_og = 'uploads/products/'.$filename;
      $image->move(public_path('uploads/products/'), $filename);

      $product->images()->create([
        'image_path' => $destination_og,
        'thumbnail' => $destination_og
      ]);

      $product_images = $product->images;

      $last_image = $product_images[count($product_images) - 1];

      $product->image = $last_image->thumbnail;
      $product->save();

      $request->session()->flash('message', 'Product Image Added.');

      return redirect()->back();
  }

  public function deleteImage(Request $request, Image $image)
  {
    $product = $image->product;

    if (count($product->images) > 1) {
      Image::where('id', $image->id)->delete();
      $request->session()->flash('message', 'Image deleted Successfully.');
    }
    else {
      $request->session()->flash('warning', 'Image cannot be Deleted.');
    }

    return redirect()->back();
  }


}
