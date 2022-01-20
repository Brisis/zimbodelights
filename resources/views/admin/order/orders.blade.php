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
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-globe2 small me-2"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Orders</li>
            </ol>
        </nav>
    </div>

    <!-- <div class="card">
        <div class="card-body">
            <div class="d-md-flex gap-4 align-items-center">
                <div class="d-none d-md-flex">All Orders</div>
                <div class="d-md-flex gap-4 align-items-center">
                    <form class="mb-3 mb-md-0">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option>Sort by</option>
                                    <option value="desc">Processing</option>
                                    <option value="asc">Shipped</option>
                                    <option value="asc">Delivered</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                              <button class="btn btn-primary btn-icon">
                                  <i class="bi bi-filter"></i> Filter
                              </button>
                            </div>
                            <div class="col-md-6">
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
    </div> -->

    <div class="table-responsive">
        <table class="table table-custom table-lg mb-0" id="orders">
            <thead>
            <tr>
                <th>
                    <input class="form-check-input select-all" type="checkbox" data-select-all-target="#orders"
                           id="defaultCheck1">
                </th>
                <th>Order No.</th>
                <th>Buyer Name</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
            <tr>
                <td>
                    <input class="form-check-input" type="checkbox">
                </td>
                <td>
                    <a href="#">#{{ $order->id }}</a>
                </td>
                <td>{{ $order->buyer_name }}</td>
                <td>{{ $order->created_at->diffForHumans() }}</td>
                <td>$@convert($order->total)</td>
                <td>
                  @if($order->status == 'pending')
                  <span class="badge bg-primary">Processing</span>
                  @endif

                  @if($order->status == 'shipped')
                  <span class="badge bg-dark">Shipped</span>
                  @endif

                  @if($order->status == 'delivered')
                  <span class="badge bg-success">Delivered</span>
                  @endif
                </td>
                <td class="text-end">
                    <a href="{{ route('admin.orders.order', $order->id) }}" class="">Show Order</a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    {{ $orders->links('admin.partials.pagination') }}

    </div>
    <!-- ./ content -->

    @endsection
