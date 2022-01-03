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
                <li class="breadcrumb-item active" aria-current="page">Orders</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-md-flex gap-4 align-items-center">
                <div class="d-none d-md-flex">All Categories</div>
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
                    <a href="{{ route('admin.categories.add_category') }}" class="btn btn-primary">Add Category</a>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-custom table-lg mb-0" id="orders">
            <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Total Products</th>
                <th class="text-end">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
              <tr>
                  <td>
                      <a href="#">#{{ $category->id }}</a>
                  </td>
                  <td>
                      <a href="#">
                        <img src="{{ asset($category->picture) }}" class="rounded" width="40"
                             alt="...">
                      </a>
                  </td>
                  <td>{{ $category->name }}</td>
                  <td>/{{ $category->slug }}</td>
                  <td>{{ count($category->products) }}</td>
                  <td class="text-end">
                      <a href="{{ route('admin.categories.category', $category->id) }}" class="">Show Category</a>
                  </td>
              </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $categories->links('admin.partials.pagination') }}

    </div>
    <!-- ./ content -->

    @endsection
