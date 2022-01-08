@extends('admin.layouts.app')

@section('content')

<!-- sidebars -->
@include('admin.partials.side-nav')
<!-- ./ sidebars -->

<!-- layout-wrapper -->
<div class="layout-wrapper">

    <!-- header -->
      @include('admin.partials.header')
    <!-- ./ header -->

    <!-- content -->
    <div class="content ">

    <div class="mb-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">
                        <i class="bi bi-globe2 small me-2"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        @if(session()->has('message'))
        <div class="col-9 mb-2">
          <div class="card alert alert-success bg-success">
            <div class="card-body">
              <p class="text-white">{{ session()->get('message') }}</p>
            </div>
          </div>
        </div>
        @endif
        @if(session()->has('warning'))
        <div class="col-9 mb-2">
          <div class="card alert alert-warning bg-warning">
            <div class="card-body">
              <p class="text-white">{{ session()->get('warning') }}</p>
            </div>
          </div>
        </div>
        @endif

        <div class="mb-5 col-lg-9 ">
          <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h5>Edit Product</h5>
                <div class="">
                  @if($product->is_draft)
                    <a class="btn btn-primary btn-sm" href="#" onclick="event.preventDefault(); document.getElementById('public-form').submit();">Make Public</a>
                    <form id="public-form" action="{{ route('admin.products.make_public', $product->id) }}" method="POST" hidden>
                        @csrf
                        @method('POST')
                    </form>
                  @else
                    <a class="btn btn-primary btn-sm" href="#" onclick="event.preventDefault(); document.getElementById('draft-form').submit();">Make Draft</a>
                    <form id="draft-form" action="{{ route('admin.products.make_draft', $product->id) }}" method="POST" hidden>
                        @csrf
                        @method('POST')
                    </form>
                  @endif
                  <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="m-3"><i class="bi bi-trash me-0"></i> Delete</a>
                  <form id="delete-form" action="{{ route('admin.products.delete_product', $product->id) }}" method="POST" hidden>
                      @csrf
                      @method('DELETE')
                  </form>
                </div>
              </div>
              <div class="card-body">
                  <div class="row">
                    @if(session()->has('edit_done'))
                    <div class="col-9 mb-2">
                      <p class="text-success">{{ session()->get('edit_done') }}</p>
                    </div>
                    @endif

                    <form action="{{ route('admin.products.edit_product', $product->id) }}" method="post">

                      @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Product name</label>
                            <input type="text" class="form-control" id="name"
                                   aria-describedby="emailHelp" name="name" value="{{ $product->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
                        </div>

                        <div class="mb-3">
                            <label for="discount" class="form-label">Discount % (optional)</label>
                            <input type="number" class="form-control" id="discount" name="discount" value="{{ $product->discount }}">
                        </div>

                        <div class="mb-3">
                            <label for="qty" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="qty" name="stock" value="{{ $product->stock }}">
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Description</label>
                            <textarea name="description" rows="3" class="form-control" name="description">{{ $product->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                  </div>
              </div>
              <div class="demo-code-preview">
                  <p>Product information</p>
              </div>
          </div>
        </div>

        <div class="mb-5 col-lg-9 ">
          <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h5>Edit Product Status</h5>
              </div>
              <div class="card-body">
                  <div class="row">
                    @if(session()->has('edit_status'))
                    <div class="col-9 mb-2">
                      <p class="text-success">{{ session()->get('edit_status') }}</p>
                    </div>
                    @endif

                    <form action="{{ route('admin.products.edit_status', $product->id) }}" method="post">

                      @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Status</label>
                            <select class="form-select" name="status">
                                <option selected>Select Status</option>
                                <option value="Not Set">Not Set</option>
                                <option value="is_deal">Is Deal</option>
                                <option value="is_trending">Is Trending</option>
                                <option value="is_top">Is Top Picks</option>
                                <option value="is_special">Is Specials</option>
                                <option value="is_foodies">Is Foodies</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                  </div>
              </div>
              <div class="demo-code-preview">
                  <p>Product Status</p>
              </div>
          </div>
        </div>

        <div class="mb-5 col-lg-9">
          <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h5>Product Images</h5>
                <a class="btn btn-primary btn-sm" href="{{ route('admin.products.add_product_images', $product->id) }}">Add Images</a>
              </div>
              <div class="card-body">
                  <div class="row">
                    @foreach($images as $image)
                    <div class="col-4 mb-3">
                      <form class="" action="{{ route('admin.products.delete_image', $image->id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                          <img class="img-thumbnail" style="width: 12rem" src="{{ asset($image->thumbnail) }}" alt="image">
                        </div>
                        <button type="submit" name="button" class="btn btn-primary btn-sm">Delete</button>
                      </form>
                    </div>
                    @endforeach
                  </div>
              </div>
              <div class="demo-code-preview">
                  <p>Product images</p>
              </div>
          </div>
        </div>

        <div class="col-lg-9">

            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab"
                               aria-controls="description" aria-selected="true">Description</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab"
                               aria-controls="reviews" aria-selected="false">Reviews ({{ count($product->reviews) }})</a>
                        </li> -->
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                             aria-labelledby="description-tab">
                            <p>{{ $product->description }}</p>
                        </div>
                        <!-- <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="mb-5">
                                        <div class="display-6">4.0</div>
                                        <div class="d-flex gap-2 my-3">
                                            <i class="bi bi-star-fill icon-lg text-warning"></i>
                                            <i class="bi bi-star-fill icon-lg text-warning"></i>
                                            <i class="bi bi-star-fill icon-lg text-warning"></i>
                                            <i class="bi bi-star-fill icon-lg text-warning"></i>
                                            <i class="bi bi-star-fill icon-lg text-muted"></i>
                                            <span>(3)</span>
                                        </div>
                                    </div>
                                    <div class="list-group list-group-flush mb-4">
                                        <div class="list-group-item d-flex px-0">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <span class="avatar-text bg-purple rounded-circle">R</span>
                                            </div>
                                            <div>
                                                <h5 class="mb-1">Rodger Stutely</h5>
                                                <div class="d-flex gap-2 mb-3">
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-muted"></i>
                                                </div>
                                                <div>I love your products. It is very easy and fun to use this panel. I would
                                                    recommend it
                                                    to
                                                    everyone.
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>
    <!-- ./ content -->

    @endsection
