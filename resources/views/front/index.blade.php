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
          <a href="{{ route('search') }}"><i class="iconly-Search icli"></i></a>
        </li>
        @if($socials)
        <li>
          <a target="_blank" href="{{ $socials->facebook }}"><img src="{{ asset('static/images/icons/fb.svg') }}" width="22px" class="img-fluid" alt=""></a>
        </li>
        <li>
          <a target="_blank" href="{{ $socials->instagram }}"><img src="{{ asset('static/images/icons/insta.svg') }}" width="22px" class="img-fluid" alt=""></a>
        </li>
        <li>
          <a target="_blank" href="{{ $socials->twitter }}"><img src="{{ asset('static/images/icons/tw.svg') }}" width="22px" class="img-fluid" alt=""></a>
        </li>
        @endif
      </ul>
    </div>
  </header>


  @include('front.partials.side-menu')

  <!-- category start -->
  <section class="category-section top-space">
    <ul class="category-slide">
      @foreach($categories as $category)
      <li>
        <a href="{{ route('categories.category', $category->slug) }}" class="category-box">
          <img src="{{ asset($category->picture) }}" class="img-fluid" alt="">
          <h4 style="width: 80px; font-size: 8pt; overflow: hidden;">{{ $category->name }}</h4>
        </a>
      </li>
      @endforeach
    </ul>
  </section>
  <div class="divider t-12 b-20"></div>
  <!-- category end -->


  <!-- home slider start -->
  <section class="pt-0 home-section ratio_55">
    <div class="home-slider slick-default theme-dots">
      @foreach($banners as $banner)
      <div>
        <div class="slider-box">
          <img src="{{ asset($banner->image) }}" class="img-fluid bg-img" alt="">
          <div class="slider-content">
            <div>
              @if($banner->title)<h2 class="text-white">{{ $banner->title }}</h2>@endif
              @if($banner->subtitle)<h1 style="color:#FFD700">{{ $banner->subtitle }}</h1>@endif
            <!--  <h6 class="text-white">Quick order Delivery</h6>-->
              <a href="{{ $banner->url_link }}" class="btn btn-solid">GET MORE</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>
  <!-- home slider end -->

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
                  <h4>$@convert($product->price)
                    @if($product->discount)
                    <del>$@convert($product->price + (($product->price * $product->discount) / 100) )</del><span>{{ $product->discount }}%</span>
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
  <div class="divider"></div>
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
          <a href="{{ route('deals') }}">explore now</a>
        </div>
      </div>
      <div class="banner-img">
        <img src="{{ asset($deal->image) }}" width="150" class="img-fluid" alt="">
      </div>
    </div>
  </section>
  <!-- timer banner end -->
  @endif
  <div class="divider"></div>
  <!-- deals section end -->

  <!-- tab section start -->
  <section class="pt-0 tab-section" id="app-two">
    <div class="title-section px-15 mt-3">
      <h2>Find your Groceries</h2>
      <h3>Get a familiar test in Food</h3>
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
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- tab section end -->



  <div class="divider"></div>
  <!-- brands section end -->

  <!-- kids corner section start -->
  <section class="pt-0 product-slider-section overflow-hidden" id="app-three">
    <div class="title-section px-15 mt-3">
      <h2>The Foodies Corner</h2>
      <h3>Get all your favourite snacks in one corner </h3>
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
