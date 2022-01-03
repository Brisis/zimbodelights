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

    <div class="row">

        <div class="order-2 order-lg-1 col-lg-9 bd-content">
          <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h5>{{ $product->name }}</h5>
                <a href="{{ route('admin.products.product', $product->id) }}">View Product</a>
              </div>
              <div class="card-body">
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

                    @foreach($images as $image)
                    <div class="col-4 mb-3">
                      <form action="{{ route('admin.products.delete_image', $image->id) }}" method="post">
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

        <div class="order-2 order-lg-1 col-lg-9 bd-content">

            <h4>Add File</h4>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.products.add_product_images', $product) }}" method="post" enctype="multipart/form-data">
                      @csrf
                        <div class="mb-3">
                            <label for="image" class="form-label">Product image</label>
                            <input type="file" class="form-control" id="file" name="image_path" accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>

        </div>

    </div>

    </div>
    <!-- ./ content -->

  @endsection
