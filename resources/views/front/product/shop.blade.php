@extends('front.layouts.app')

@section('content')


  <!-- header start -->
  <header>
    <div class="back-links">
      <a href="{{ route('home') }}">
        <i class="iconly-Arrow-Left icli"></i>
        <div class="content">
          <h2>Deals of the day</h2>
        </div>
      </a>
    </div>
    <div class="header-option">
      <ul>
        <li>
          <a href="{{ route('cart') }}">
            <style media="screen">
            .badge {
              padding-left: 9px;
              padding-right: 9px;
              -webkit-border-radius: 9px;
              -moz-border-radius: 9px;
              border-radius: 9px;
              }

              .label-warning[href],
              .badge-warning[href] {
              background-color: #c67605;
              }
              #lblCartCount {
                font-size: 12px;
                background: #ff0000;
                color: #fff;
                padding: 0 5px;
                vertical-align: top;
                margin-left: -10px;
              }
            </style>
            <i class="iconly-Buy icli"></i>
            @if(session('cart'))
              <span class='badge badge-warning' id='lblCartCount'>{{ count(session('cart')) }}</span>
            @endif
          </a>

        </li>
      </ul>
    </div>
  </header>
  <!-- header end -->


  <!-- products start -->
  <section class="px-15 lg-t-space" id="app">
    <div class="row gy-3 gx-3">
      @foreach($products as $product)
      <div class="col-6">
        <div class="product-box ratio_square">
          <div class="img-part">
            <a href="{{ route('product', $product->slug) }}"><img src="{{ asset($product->image) }}" alt="" class="img-fluid bg-img"></a>
            @if($product->stock != 1)
            <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#removecart" onclick="event.preventDefault();" v-on:click="addToCart('{{ $product->id }}')">
              <div class="wishlist-btn">
                <i class="iconly-Heart icli"></i>
                <i class="iconly-Heart icbo"></i>
              </div>
            </a>
            @endif
          </div>
          <div class="product-content">
            <a href="{{ route('product', $product->slug) }}">
              @if($product->stock == 1) <span class="text-danger">Out of Stock</span> @endif
              <h4>{{ $product->name }}</h4>
            </a>
            <div class="price">
              <h4>£@convert($product->price)
                @if($product->discount)
                <del>£@convert($product->price + (($product->price * $product->discount) / 100) )</del><span>{{ $product->discount }}%</span>
                @endif
              </h4>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>
  <!-- products end -->

  <!-- panel space start -->
  <section class="panel-space"></section>
  <!-- panel space end -->

  <!-- remove item canvas start -->
    <div class="offcanvas offcanvas-bottom h-auto removecart-canvas" id="removecart">
        <div class="offcanvas-body small">
            <div class="content">
                <h4>Product added to Cart</h4>
            </div>
            <div class="bottom-cart-panel">
                <div class="row">
                    <div class="col-7">
                        <a href="{{ route('cart') }}" class="title-color">GO TO CART</a>
                    </div>
                    <div class="col-5">
                        <a href="{{ route('checkout') }}" class="theme-color">CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- remove item canvas end -->

  <!-- production version, optimized for size and speed -->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        qty: 0
      },
      methods: {
        addToCart: async function (product) {
          const response = await axios.get(`/add-to-cart/${product}`);
        }
      }
    });

  </script>


  @include('front.partials.bottom-nav')


  @endsection
