@extends('front.layouts.app')

@section('content')


  <!-- header start -->
  <header class="bg-transparent">
    <div class="back-links">
      <a href="{{ route('buyer.orders') }}">
        <i class="iconly-Arrow-Left icli"></i>
        <div class="content">
          <h2>Order Details</h2>
        </div>
      </a>
    </div>
  </header>
  <!-- header end -->

  <!-- product detail start -->
  <div class="map-product-section px-15">
    <div class="product-inline">
      <a href="">
        <img src="{{ asset('static/images/truck.gif') }}" class="img-fluid" alt="">
      </a>
      <div class="product-inline-content">
        <div>
          <a href="#!">
            <h4>@foreach($order->items as $product) {{ $product->product->name }},  @endforeach</h4>
          </a>

          <div class="price">
            <h4>$@convert($order->total)</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- product detail end -->


  <!-- order tracking start -->
  <div class="order-track px-15">
    <div class="order-track-step">
      <div class="order-track-status">
        <span class="order-track-status-dot">
          <img src="assets/svg/check.svg" class="img-fluid" alt="">
        </span>
        <span class="order-track-status-line"></span>
      </div>
      <div class="order-track-text">
        <p class="order-track-text-stat">Order Processing</p>
        <span class="order-track-text-sub">order received, being processed</span>
      </div>
    </div>
    @if($order->status == 'shipped' || $order->status == 'delivered') <div class="order-track-step"> @else <div class="order-track-step in-process"> @endif
      <div class="order-track-status">
        <span class="order-track-status-dot">
          <img src="assets/svg/check.svg" class="img-fluid" alt="">
        </span>
        <span class="order-track-status-line"></span>
      </div>
      <div class="order-track-text">
        <p class="order-track-text-stat"> In Transit</p>
        <span class="order-track-text-sub">order on the way</span>
      </div>
    </div>
    @if($order->status == 'delivered') <div class="order-track-step"> @else <div class="order-track-step in-process"> @endif
      <div class="order-track-status">
        <span class="order-track-status-dot">
          <img src="assets/svg/check.svg" class="img-fluid" alt="">
        </span>
        <span class="order-track-status-line"></span>
      </div>
      <div class="order-track-text">
        <p class="order-track-text-stat"> Delivered</p>
        <span class="order-track-text-sub">20/05/2020</span>
      </div>
    </div>
  </div>
  <div class="divider"></div>
  <!-- order tracking end -->

  <!-- address section start -->
  <div class="px-15">
    <h6 class="tracking-title content-color">Shipping Details</h6>
    <h4 class="fw-bold mb-1">{{ $order->buyer_name }}</h4>
    <h4 class="content-color">{{ $order->email }}</h4>
    <h4 class="content-color">{{ $order->buyer_address }}</h4>
    <h4 class="fw-bold mt-1">Order No: #{{ $order->id }}4</h4>
  </div>
  <div class="divider"></div>
  <!-- address section end -->


  <!-- order details section start -->
  <div class="px-15 section-b-space">
    <h6 class="tracking-title content-color">Price Details</h6>
    <div class="order-details">
      <ul>
        <li>
          <h4>Delivery <span>$10</span></h4>
        </li>
      </ul>
      <div class="total-amount">
        <h4>Total Amount <span>$@convert($order->total)</span></h4>
      </div>
      <a href="javascript:window.print()" class="btn btn-outline content-color w-100 mt-4">Download Invoice</a>
    </div>
  </div>
  <!-- order details section end -->

  @endsection
