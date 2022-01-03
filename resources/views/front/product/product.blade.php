@extends('front.layouts.app')

@section('content')

    <!-- header start -->
    <header>
        <div class="back-links">
            <a href="{{ route('home') }}">
                <i class="iconly-Arrow-Left icli"></i>
                <div class="content">
                    <h2>{{ $product->name }}</h2>
                </div>
            </a>
        </div>
        <div class="header-option">
            <ul>
                <li>
                    <a href=""><img src="{{ asset('static/svg/share-2.svg') }}" class="img-fluid" alt=""></a>
                </li>
                <li>
                  <a href="{{ route('cart') }}"><i class="iconly-Buy icli"></i></a>
                </li>
            </ul>
        </div>
    </header>
    <!-- header end -->
    <style media="screen">
      .product-img img {
        width: 400px;
        height: 400px;
        border-radius: 3px;
        -o-object-fit: cover;
        object-fit: cover;
        display: block;
        margin-left: auto;
        margin-right: auto;
      }
    </style>

    <!-- slider start -->
    <section class="product-page-section top-space pt-0">
        <div class="home-slider slick-default theme-dots ratio_asos overflow-hidden">
          @foreach($images as $image)
            <div class="product-img">
                <a href="{{ asset($image->thumbnail) }}">
                    <img src="{{ asset($image->thumbnail) }}" class="img-fluid" alt="">
                </a>
            </div>
            @endforeach
        </div>
        <div class="product-detail-box px-15 pt-2">
            <div class="main-detail">
                <h2 class="text-capitalize">{{ $product->name }}</h2>
                <div class="rating-section">
                    @if($reviews->isNotEmpty())
                    <ul class="ratings">
                      @foreach(range(1,5) as $i)
                          <li>
                            @while($avgRating > 0)
                                @if($avgRating > 0.5)
                                    <i class="iconly-Star icbo"></i>
                                @else
                                    <i class="iconly-Star icbo empty"></i>
                                @endif
                                @php $avgRating--; @endphp
                            @endwhile
                          </li>
                      @endforeach
                        <!-- <li><i class="iconly-Star icbo"></i></li>
                        <li><i class="iconly-Star icbo"></i></li>
                        <li><i class="iconly-Star icbo"></i></li>
                        <li><i class="iconly-Star icbo"></i></li>
                        <li><i class="iconly-Star icbo empty"></i></li> -->
                    </ul>
                    @endif
                    <h6 class="content-color">({{ count($reviews) }} Reviews)</h6>
                </div>
                <div class="price">
                  <h4 style="font-size: 14pt">$@convert($product->price)
                    @if($product->discount)
                    <del>$@convert($product->price + (($product->price * $product->discount) / 100) )</del><span>{{ $product->discount }}%</span>
                    @endif
                  </h4>
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <div class="product-detail-box px-15">
            <h4 class="page-title mb-1">Product Details</h4>
            <h4 class="content-color mb-3">{{ $product->description }}</h4>
        </div>
        <div class="divider"></div>

        <div class="product-detail-box px-15">
            <h4 class="page-title">Customer Reviews ({{ count($reviews) }}) <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasreview">Add Review</a></h4>
            @if($reviews->isNotEmpty())
            <div class="review-section">
                <ul>
                    @foreach($reviews as $review)
                    <li class="mb-3">
                        <div class="media">
                            @if($review->user->profile_picture)
                              <img src="{{ asset($review->user->profile_picture) }}" alt="Picture" class="img-fluid">
                            @else
                            <img src="{{ asset('static/images/ph.png') }}"
                                 class="img-fluid" alt="image">
                            @endif
                            <div class="media-body">
                                <h4>{{ $review->user->name}} | {{date('d-m-Y', strtotime($review->created_at))}}</h4>
                                <ul class="ratings">
                                  @php $rating = $review->rating; @endphp

                                  @foreach(range(1,5) as $i)
                                      <li>
                                        @while($rating > 0)
                                            @if($rating > 0.5)
                                                <i class="iconly-Star icbo"></i>
                                            @else
                                                <i class="iconly-Star icbo empty"></i>
                                            @endif
                                            @php $rating--; @endphp
                                        @endwhile
                                      </li>
                                  @endforeach
                                </ul>
                            </div>
                        </div>
                        <h4 class="content-color">{{ $review->description }}</h4>
                    </li>
                    <br>
                    @endforeach
                </ul>
            </div>
            @else
            <p>No reviews yet</p>
            @endif
        </div>

        <div class="divider"></div>
    </section>
    <!-- slider end -->


    <!-- related section start -->
    <section class="pt-0 product-slider-section overflow-hidden" id="app-two">
        <div class="title-section px-15 mt-3">
            <h2>Similar Products</h2>
        </div>
        <div class="product-slider slick-default pl-15">
          @foreach($products as $product)
            <div>
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
        </div>
    </section>
    <!-- related section end -->


    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->




    <!-- fixed panel start -->
    <div class="fixed-panel">
        <div class="row">
            <div class="col-6">
                <a href="{{ route('home') }}"><i class="iconly-Home icli"></i>Home</a>
            </div>
            <div class="col-6" id="app-one">
                <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#removecart" onclick="event.preventDefault();" v-on:click="addToCart('{{ $product->id }}')" class="theme-color"><i class="iconly-Heart icli"></i>ADD TO CART</a>
            </div>
        </div>
    </div>
    <!-- fixed panel end -->

    <!-- add review canvas start -->
    <div class="offcanvas offcanvas-bottom h-auto" tabindex="-1" id="offcanvasreview">
      <form action="{{ route('add_review', $product->id) }}" method="post">
        @csrf
        <div class="offcanvas-body">
            <h2 class="mb-2">Write Review</h2>
            <div class="d-flex align-items-center">
                <h4 class="content-color me-2">Your rating:</h4>
                <select name="rating" required>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
            </div>
            <h4 class="content-color mt-2 mb-2">Review:</h4>
            <div class="mb-4 section-b-space">
                <textarea rows="4" class="form-control" name="description" required></textarea>
            </div>
            <div class="cart-bottom row m-0">
                <div>
                    <div class="left-content col-5">
                        <a data-bs-dismiss="offcanvas" href="javascript:void(0)" class="title-color">BACK</a>
                    </div>
                    <button type="submit"
                        class="btn btn-solid col-7 text-uppercase">Submit</button>
                </div>
            </div>
        </div>
      </form>
    </div>
    <!-- add review canvas end -->

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


    </script>


    @endsection
