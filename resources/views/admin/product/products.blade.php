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
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex gap-4 align-items-center">
                        <div class="d-none d-md-flex">All Products</div>
                        <div class="d-md-flex gap-4 align-items-center">
                            <form class="mb-3 mb-md-0">
                                <div class="row g-3">
                                  <div class="col-md-12">
                                      <div class="input-group">
                                          <input type="text" class="form-control" placeholder="Search">
                                          <button class="btn btn-outline-light" type="button">
                                              <i class="bi bi-search"></i>
                                          </button>
                                      </div>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-custom table-lg mb-0" id="products">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Created At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>
                            <a href="{{ route('admin.products.product', $product->id) }}">#{{ $product->id }}</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.products.product', $product->id) }}">
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
                        <td>{{ date('d/m/Y', strtotime($product->created_at)) }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.products.product', $product->id) }}" class="">Show Product</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{ $products->links('admin.partials.pagination') }}

        </div>

    </div>

    </div>
    <!-- ./ content -->

    @endsection
