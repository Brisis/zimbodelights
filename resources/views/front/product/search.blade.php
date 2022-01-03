@extends('front.layouts.app')

@section('content')

    <!-- search panel start -->
    <div class="search-panel w-back pt-3 px-15">
        <a href="{{ route('home') }}" class="back-btn"><i class="iconly-Arrow-Left icli"></i></a>
        <a href="{{ route('home') }}" style="color: #FF4C3B;">Go Home</a>
    </div>
    <!-- search panel end -->

    <!-- search panel start -->
    <div class="search-panel xl-space px-15">
      <div class="search-bar" style="width:100%;">
        <form class="" action="{{ route('search') }}" method="get">
              <input class="form-control form-theme" placeholder="Search" name="search">
              <i class="iconly-Search icli search-icon"></i>
        </form>
      </div>
    </div>
    <!-- search panel end -->

    <section class="px-15 lg-t-space">
      <div class="title-part">
        <h3>Search results for: <b>{{ $searchQry }}</b> </h3>
      </div>
    </section>

    <!-- products start -->
    <section class="px-15 lg-t-space" id="app">
      <div class="row gy-3 gx-3">
      @if($products->isNotEmpty())
        @foreach($products as $product)
        <div class="col-6">
          <div class="product-box ratio_square">
            <div class="img-part">
              <a href="{{ route('product', $product->slug) }}"><img src="{{ asset($product->image) }}" alt="" class="img-fluid bg-img"></a>
              <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#removecart" onclick="event.preventDefault();" v-on:click="addToCart('{{ $product->id }}')">
                <div class="wishlist-btn">
                  <i class="iconly-Heart icli"></i>
                  <i class="iconly-Heart icbo"></i>
                </div>
              </a>
            </div>
            <div class="product-content">
              <a href="{{ route('product', $product->slug) }}">
                <h4>{{ $product->name }}</h4>
              </a>
              <div class="price">
                <h4>$@convert($product->price)
                  @if($product->discount)
                  <del>$@convert($product->price + (($product->price * $product->discount) / 100) )</del><span>{{ $product->discount }}%</span>
                  @endif
                </h4>
              </div>
            </div>
          </div>
        </div>
        @endforeach

        @else
        <div class="mt-5 text-center">
           <h2>No products found</h2>
       </div>
        @endif
      </div>
    </section>
    <!-- products end -->

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


    @endsection
