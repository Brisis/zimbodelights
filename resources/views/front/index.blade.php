@extends('front.layouts.app')

@section('content')

  <!-- header start -->
  <header>
    <div class="nav-bar">
      <img src="{{ asset('static/svg/bar.svg') }}" class="img-fluid" alt="">
    </div>
    <a href="{{ route('home') }}" class="brand-logo">
      <img src="{{ asset('static/images/logo.png') }}" class="img-fluid" alt="">
    </a>
    <div class="header-option">
      <ul>
        <li>
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
        </li>
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


  @include('front.partials.side-menu')
  <div class="divider t-12 b-20"></div>


  <!-- home slider start -->
  <section class="t-10 home-section ratio_55">
    <div class="home-slider slick-default theme-dots">
      @foreach($banners as $banner)
      <div>
        <div class="slider-box">
          <img src="{{ asset($banner->image) }}" class="img-fluid bg-img" alt="">
          <div class="slider-content" style="left:35%;">
            <div class="text-center">
              @if($banner->title)<h2 style="color:#FF4C3B">{{ $banner->title }}</h2>@endif
              @if($banner->subtitle)<h1 style="color:#FFD700">{{ $banner->subtitle }}</h1>@endif
            <!--  <h6 class="text-white">Quick order Delivery</h6>-->
              <a href="{{ $banner->url_link }}" class="btn btn-solid">START SHOPPING</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>
  <!-- home slider end -->
  <div class="divider t-12" style="background-color: #f9b041 !important;"></div>

  <!-- category start -->
  <section class="category-section" id="categories">
    <div class="title-section px-15 mt-3">
      <h2 class="text-uppercase">Top Categories</h2>
    </div>
    <div class="row px-15">

      @foreach($categories as $category)
      <div class="col-md-6 col-6 mb-3">
        <!-- <div class="parent">
          <div class="product-content child" style="background-image: url({{ asset($category->picture) }});background-position: center; background-size: cover;background-repeat: no-repeat;">
            <a href="{{ route('categories.category', $category->slug) }}">
              <div class="category-title p-1">
                  <h1 class="text-white">{{ $category->name }}</h1>
              </div>
            </a>
          </div>
        </div> -->
        <div class="product-box ratio_square">
          <div class="img-part">
            <a href="{{ route('categories.category', $category->slug) }}">
              <img src="{{ asset($category->picture) }}" alt="" class="img-fluid bg-img">
            </a>
          </div>
          <div class="product-content">
            <a href="{{ route('categories.category', $category->slug) }}">
              <h3 class="text-center text-uppercase">{{ $category->name }}</h3>
            </a>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </section>
  <!-- category end -->
  <!-- <div class="divider t-12 b-5" style="background-color: #ee4035 !important;"></div> -->

    <section class="mb-5">
      <div class="row">
        <div class="col-md-4 col-12">
          <div style="width: 100%; display: inline-block;background-color:#489834;text-align:center;padding: 10px;">
              <div class="brand-box">
                <img src="{{ asset('static/images/icons/delivery.png') }}" style="filter:invert(100%)" width="50" class="img-fluid" alt="">
                <h3 class="text-white text-uppercase">Fast Shipping</h3>
                <!-- Free delivery on all orders above $399 -->
              </div>
            </div>
        </div>

        <div class="col-md-4 col-12">
          <div style="width: 100%; display: inline-block;background-color:red;text-align:center;padding: 10px;">
              <div class="brand-box">
                <img src="{{ asset('static/images/icons/payment.png') }}" style="filter:invert(100%)" width="50" class="img-fluid" alt="">
                <h3 class="text-white text-uppercase">Secure Payment</h3>
              <!-- Fast and secure payment guaranteed -->
              </div>
            </div>
        </div>

        <div class="col-md-4 col-12">
          <div style="width: 100%; display: inline-block;background-color:#f9b041;text-align:center;padding: 10px;">
              <div class="brand-box">
                <img src="{{ asset('static/images/icons/rocket.png') }}" style="filter:invert(100%)" width="50" class="img-fluid" alt="">
                <h3 class="text-white text-uppercase">next day delivery</h3>
                <!-- Limited to Greater Toronto Area -->
              </div>
            </div>
        </div>
      </div>
    </section>

  <!-- <div class="divider t-12 b-20" style="background-color: #ee4035 !important;"></div> -->

  <!-- deals section start -->
  <section class="deals-section px-15 pt-0" id="app-one">
    <div class="title-part">
      <h2>Deals of the Day</h2>
      <a href="{{ route('deals') }}">See All</a>
    </div>
    <div class="product-section">
      <div class="row gy-3">
        @foreach($deals as $product)
        <div class="col-12">
          <div class="product-inline">
            <a href="{{ route('product', $product->slug) }}">
              <img src="{{ asset($product->image) }}" class="img-fluid" alt="">
            </a>
            <div class="product-inline-content">
              <div>
                <a href="{{ route('product', $product->slug) }}">
                  <h4>{{ $product->name }}</h4>
                </a>
                <h5>{{ $product->category->name }}</h5>
                <div class="price">
                  <h4>£@convert($product->price)
                    @if($product->discount)
                    <del>£@convert($product->price + (($product->price * $product->discount) / 100) )</del><span>{{ $product->discount }}%</span>
                    @endif
                  </h4>
                </div>
              </div>
            </div>

              <a href="" data-bs-toggle="offcanvas" data-bs-target="#removecart" onclick="event.preventDefault();" v-on:click="addToCart('{{ $product->id }}')">

              <div class="wishlist-btn">
                <i class="iconly-Heart icli"></i>
                <i class="iconly-Heart icbo"></i>
              </div>
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <div class="divider" style="background-color: #489834 !important;"></div>
  <!-- deals section end -->

  @if($deal)
  <!-- timer banner start -->
  <section class="banner-timer" id="banner-deals">
    <div class="banner-bg">
      <div class="banner-content">
        <div>
          <h6>{{ $deal->name}}</h6>
          <h2>Sales Starts In</h2>
          <div class="counters">
            <div class="counter">
              <span id="days">NA</span>
              <p>Days</p>
            </div>
            <div class="counter">
              <span id="hours">NA</span>
              <p>Hours</p>
            </div>
            <div class="counter">
              <span id="minutes">NA</span>
              <p>Minutes</p>
            </div>
            <div class="counter">
              <span id="seconds">NA</span>
              <p>Seconds</p>
            </div>
          </div>
          <a href="{{ $deal->link }}">explore now</a>
        </div>
      </div>
      <div class="banner-img">
        <img src="{{ asset($deal->image) }}" width="150" class="img-fluid" alt="">
      </div>
    </div>
  </section>
  <!-- timer banner end -->
  <div class="divider" style="background-color: #373435 !important;"></div>
  <!-- deals section end -->
  @endif



  <!-- tab section start -->
  <section class="pt-0 tab-section" id="app-two">
    <div class="title-section px-15 mt-3">
      <h2>Find your Groceries</h2>
      <!-- <h3>Get a familiar taste in Food</h3> -->
    </div>
    <div class="tab-section">
      <ul class="nav nav-tabs theme-tab pl-15">
        <li class="nav-item">
          <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#trending" type="button">Trending</button>
        </li>
        <li class="nav-item">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#top" type="button">Top Picks</button>
        </li>
        <li class="nav-item">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#specials" type="button">Specials</button>
        </li>
      </ul>
      <div class="tab-content px-15">
        <div class="tab-pane fade show active" id="trending">
          <div class="row gy-3 gx-3">
            @foreach($trending as $product)
            <div class="col-md-4 col-6">
              <div class="product-box ratio_square">
                <div class="img-part">
                  <a href="{{ route('product', $product->slug) }}">
                    <img src="{{ asset($product->image) }}" alt="" class="img-fluid bg-img">
                  </a>
                  <!-- <a href="{{ url('add-to-cart/'.$product->id) }}"> -->

                    <a href="" data-bs-toggle="offcanvas" data-bs-target="#removecart" onclick="event.preventDefault();" v-on:click="addToCart('{{ $product->id }}')">
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
        </div>

        <div class="tab-pane fade" id="top">
          <div class="row gy-3 gx-3">
            @foreach($topicks as $product)
            <div class="col-md-4 col-6">
              <div class="product-box ratio_square">
                <div class="img-part">
                  <a href="{{ route('product', $product->slug) }}">
                    <img src="{{ asset($product->image) }}" alt="" class="img-fluid bg-img">
                  </a>
                  <a href="" data-bs-toggle="offcanvas" data-bs-target="#removecart" onclick="event.preventDefault();" v-on:click="addToCart('{{ $product->id }}')">
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
        </div>
        <div class="tab-pane fade" id="specials">
          <div class="row gy-3 gx-3">
            @foreach($specials as $product)
            <div class="col-md-4 col-6">
              <div class="product-box ratio_square">
                <div class="img-part">
                  <a href="{{ route('product', $product->slug) }}">
                    <img src="{{ asset($product->image) }}" alt="" class="img-fluid bg-img">
                  </a>
                  <a href="" data-bs-toggle="offcanvas" data-bs-target="#removecart" onclick="event.preventDefault();" v-on:click="addToCart('{{ $product->id }}')">
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
        </div>
      </div>
    </div>
  </section>
  <!-- tab section end -->

  <div class="divider" style="background-color: #c72b2c !important;"></div>
  <!-- brands section end -->

  <!-- kids corner section start -->
  <section class="pt-0 product-slider-section overflow-hidden" id="app-three">
    <div class="title-section px-15 mt-3">
      <h2>The Foodies Corner</h2>
    </div>
    <div class="tab-content px-15">
      <div class="row gy-3 gx-3">
        @foreach($foodies as $product)
        <div class="col-md-4 col-6">
          <div class="product-box ratio_square">
            <div class="img-part">
              <a href="{{ route('product', $product->slug) }}">
                <img src="{{ asset($product->image) }}" alt="" class="img-fluid bg-img">
              </a>
              <a href="" data-bs-toggle="offcanvas" data-bs-target="#removecart" onclick="event.preventDefault();" v-on:click="addToCart('{{ $product->id }}')">
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
    </div>
  </section>
  <!-- kids corner section end -->
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


  @include('front.partials.bottom-nav')

  @if($deal)
  <script type="text/javascript">
  // Set the countdown date
  var countDownDate = new Date("{{ $deal->duration }}").getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {

    // Get the current time
    var now = new Date().getTime();

    // Find the distance between current time and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the corresponding elements
    document.getElementById("days").innerHTML = days < 10 ? '0' + days : days;
    document.getElementById("hours").innerHTML = hours < 10 ? '0' + hours : hours;
    document.getElementById("minutes").innerHTML = minutes < 10 ? '0' + minutes : minutes;
    document.getElementById("seconds").innerHTML = seconds < 10 ? '0' + seconds : seconds;


    // If the count down is finished display Happy New Year text
    if (distance < 0) {
      document.getElementById("banner-deals").style.display = "none";
      clearInterval(x);
      document.getElementById("title").innerHTML = "Deal Has Ended";
      document.getElementById("days").innerHTML = "00";
      document.getElementById("hours").innerHTML = "00";
      document.getElementById("minutes").innerHTML = "00";
      document.getElementById("seconds").innerHTML = "00";
    }
  }, 1000);

  </script>
  @endif

  <!-- production version, optimized for size and speed -->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
  <script>
    var app = new Vue({
      el: '#app-one',
      data: {
        qty: 0
      },
      methods: {
        addToCart: async function (product) {
          const response = await axios.get(`/add-to-cart/${product}`);
        }
      }
    });

    var apptwo = new Vue({
      el: '#app-two',
      data: {
        qty: 0
      },
      methods: {
        addToCart: async function (product) {

          const response = await axios.get(`/add-to-cart/${product}`);
        }
      }
    });

    var appthree = new Vue({
      el: '#app-three',
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
