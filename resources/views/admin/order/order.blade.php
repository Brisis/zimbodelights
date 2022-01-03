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
                <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-8 col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-5 d-flex align-items-center justify-content-between">
                        <span>Order No : <a href="#">#{{ $order->id }}</a></span>
                        @if($order->status == 'pending')
                        <span class="badge bg-primary">Processing</span>
                        @endif

                        @if($order->status == 'shipped')
                        <span class="badge bg-dark">Shipped</span>
                        @endif

                        @if($order->status == 'delivered')
                        <span class="badge bg-success">Delivered</span>
                        @endif
                    </div>
                    <div class="row mb-5">
                      <form class="col-lg-12" action="{{ route('admin.orders.edit_order', $order->id) }}" method="post">
                        @csrf
                          <label for="price" class="form-label">Order Status: (current - <b>{{ $order->status }}</b> )</label>
                          <select class="form-select" name="status" required>
                              <option selected>Select status</option>
                              <option value="pending">Pending</option>
                              <option value="shipped">Shipped</option>
                              <option value="delivered">Delivered</option>
                          </select>
                        <div class="mt-3">
                          <button type="submit" class="btn btn-primary" name="button">Save</button>
                        </div>
                      </form>
                    </div>

                    <div class="row mb-5 g-4">
                        <div class="col-md-12 col-sm-12">
                            <p class="fw-bold">Order Created at</p>
                            {{ date('d/m/Y', strtotime($order->created_at)) }}
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body d-flex flex-column gap-3">
                                    <div class="">
                                        <h5 class="mb-0">Buyer Details</h5>
                                    </div>
                                    <div>Name: {{ $order->buyer_name }}</div>
                                    <div>Address: {{ $order->buyer_address }}</div>
                                    <div>
                                        Email: {{ $order->buyer_email }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body d-flex flex-column gap-3">
                                    <div class="">
                                        <h5 class="mb-0">Billing Details</h5>
                                    </div>
                                    <div>Card Holder Name: {{ $order->card_name }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h6 class="card-title mb-4">Order Cost</h6>
                    <div class="row justify-content-center mb-3">
                        <div class="col-4 text-end">Shipping :</div>
                        <div class="col-4">$10.00</div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-4 text-end">
                            <strong>Total :</strong>
                        </div>
                        <div class="col-4">
                            <strong>$@convert($order->total)</strong>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card widget">
                <h5 class="card-header">Order Items</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-custom mb-0">
                            <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>
                                    <a target="_blank" href="{{ route('product', $product->product->slug) }}">
                                        <img src="{{ asset($product->product->image) }}" class="rounded" width="60" alt="...">
                                    </a>
                                </td>
                                <td>{{ $product->product->name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>$@convert($product->product->price)</td>
                                <td>$@convert($product->price)</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
              <div class="card-body">
                  <h6 class="card-title mb-4">Invoice</h6>
                  <div class="text-center mt-4">
                      <button class="btn btn-outline-primary">Download PDF</button>
                  </div>
              </div>
            </div>
    </div>

    </div>
    <!-- ./ content -->

    @endsection
