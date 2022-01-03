@extends('front.layouts.app')

@section('content')


  <!-- header start -->
  <header>
    <div class="back-links">
      <a href="{{ route('home') }}">
        <i class="iconly-Arrow-Left icli"></i>
        <div class="content">
          <h2>Order Placed</h2>
        </div>
      </a>
    </div>
  </header>
  <!-- header end -->


  <!-- order success section start -->
  <section class="order-success-section px-15 top-space xl-space">
    <div>
      <img src="assets/images/check-circle.gif" class="img-fluid" alt="">
      <h1>Order successfully!</h1>
      <h2>Payment is successfully processed and your Order is on the way.</h2>
    </div>
  </section>
  <!-- order success section end -->


  <!-- order details section start -->
  <section class="px-15">
    <h2 class="page-title">Order Details</h2>
    <div class="details">
      <ul>
        <li class="mb-3 d-block">
          <h4 class="fw-bold mb-1">Your order number is: #{{ $order->id }}</h4>
          <h4 class="content-color">An email receipt including the details about your order has been sent to your email
            ID.</h4>
        </li>
        <li class="mb-3 d-block">
          <h4 class="fw-bold mb-1">This order will be shipped to:</h4>
          <h4 class="content-color">{{ $order->buyer_address }},</h4>
          <h4 class="content-color">{{ $order->buyer_name }}</h4>
          <h4 class="content-color">{{ $order->buyer_email }}</h4>
        </li>
      </ul>
    </div>
  </section>
  <div class="divider"></div>
  <!-- order details section end -->



  <!-- expected delivery section start -->
  <section class="px-15 pt-0">
    <h2 class="page-title">Order Summary</h2>
    <div class="product-section">
      <div class="row gy-3">
        @foreach($products as $product)
        <div class="col-12">
          <div class="product-inline">
            <a href="{{ route('product', $product->product->slug) }}">
              <img src="{{ asset($product->product->image) }}" class="img-fluid" alt="">
            </a>
            <div class="product-inline-content">
              <div>
                <a href="{{ route('product', $product->product->slug) }}">
                  <h4>{{ $product->product->name }}</h4>
                </a>
                <h5 class="content-color">Qty: {{ $product->quantity }}</h5>
                <div class="price">
                  <h4>$@convert($product->price)</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- expected delivery section end -->


  <!-- order details start -->
  <section class="px-15">
    <div class="order-details">
      <ul>
        <li>
          <h4>Delivery fee <span>$10.00</span></h4>
        </li>
      </ul>
      <div class="total-amount">
        <h4>Total Amount <span>$@convert($order->total)</span></h4>
      </div>
    </div>
  </section>
  <!-- order details end -->



  <!-- panel space start -->
  <section class="panel-space"></section>
  <!-- panel space end -->


  <!-- bottom panel start -->
  <div class="delivery-cart cart-bottom">
    <div>
      <div class="left-content">
        <a href="{{ route('buyer.orders') }}" class="title-color">Track Order</a>
      </div>
      <a href="{{ route('home') }}" class="btn btn-solid">Continue shopping</a>
    </div>
  </div>
  <!-- bottom panel end -->


@endsection
