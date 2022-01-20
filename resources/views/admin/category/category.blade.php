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
                    <a href="{{ route('admin.categories.categories') }}">
                        <i class="bi bi-globe2 small me-2"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
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
              <div class="card-header">
                <h5>Category Details</h5>
              </div>
              <div class="card-body">
                  <div class="row">
                    @if(session()->has('edit_done'))
                    <div class="col-9 mb-2">
                      <p class="text-success">{{ session()->get('edit_done') }}</p>
                    </div>
                    @endif

                    <form action="{{ route('admin.categories.category', $category->id) }}" method="post" enctype="multipart/form-data">

                      @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Product name</label>
                            <input type="text" class="form-control" id="name"
                                   aria-describedby="categoryName" name="name" value="{{ $category->name }}">
                        </div>

                        <!--<div class="mb-3">
                            <label for="slug" class="form-label">Slug URL</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug }}">
                        </div>-->

                        <div class="mb-3">
                          <label for="price" class="form-label">Image</label>
                          <input type="file" class="form-control" id="file" name="image_path" accept="image/*"> <br>
                          <img class="img-thumbnail" style="width: 12rem" src="{{ asset($category->picture) }}" alt="image">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                  </div>
              </div>
              <div class="demo-code-preview">
                  <p>Category information</p>
              </div>
          </div>
        </div>

        <div class="col-lg-9">

            <div class="card">
                <div class="card-header">
                    <h5>Category Products</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-custom table-lg mb-0" id="products">
                          <thead>
                          <tr>
                              <th>Photo</th>
                              <th>Name</th>
                              <th>Stock</th>
                              <th>Price</th>
                              <th class="text-end">Actions</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($products as $product)
                          <tr>
                              <td>
                                  <a href="#">
                                    @if($product->image)
                                      <img src="{{ asset($product->image) }}" class="rounded" width="40"
                                           alt="...">
                                    @else
                                    <img src="{{ asset('static_admin/assets/images/ph.png') }}" class="rounded" width="40"
                                         alt="...">
                                    @endif
                                  </a>
                              </td>
                              <td>{{ $product->name }}</td>
                              <td>
                                @if($product->stock >= 1)
                                  <span class="text-success">In Stock</span>
                                @else
                                  <span class="text-danger">Out of Stock</span>
                                @endif
                              </td>
                              <td>$@convert($product->price)</td>
                              <td class="text-end">
                                  <a href="{{ route('admin.products.product', $product->id) }}" class="">Show Product</a>
                              </td>
                          </tr>
                          @endforeach
                          </tbody>
                      </table>
                  </div>
                  <nav class="mt-4" aria-label="Page navigation example">
                      <ul class="pagination justify-content-center">
                          <li class="page-item">
                              <a class="page-link" href="#" aria-label="Previous">
                                  <span aria-hidden="true">&laquo;</span>
                              </a>
                          </li>
                          <li class="page-item active"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                  <span aria-hidden="true">&raquo;</span>
                              </a>
                          </li>
                      </ul>
                  </nav>
                </div>
            </div>

        </div>
    </div>

    </div>
    <!-- ./ content -->

    @endsection
