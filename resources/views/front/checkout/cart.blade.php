@extends('front.layouts.app')

@section('content')

    <!-- header start -->
    <header>
        <div class="back-links">
            <a href="{{ route('home') }}">
                <i class="iconly-Arrow-Left icli"></i>
                <div class="content">
                    <h2>Shopping Cart</h2>
                    <h6>Step 1 of 2</h6>
                </div>
            </a>
        </div>
        <div class="header-option">
            <ul>
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('cart-form').submit();" title="Remove All"><i class="iconly-Delete icli"></i></a>
                    <form id="cart-form" action="{{ route('remove_all') }}" method="POST" hidden>
                        @csrf
                        @method('POST')
                    </form>
                </li>
            </ul>
        </div>
    </header>
    <!-- header end -->

    @if(session('cart'))

    <!-- cart items start -->
    <section class="cart-section pt-0 top-space xl-space">
      <div class="divider"></div>
      <?php $total = 0 ?>
       @if(session('cart'))
           @foreach(session('cart') as $id => $details)
               <?php $total += $details['price'] * $details['quantity'] ?>
               <div class="cart-box px-15" data-id="{{ $id }}">
                   <a href="{{ route('product', $details['slug']) }}" class="cart-img">
                       <img src="{{ $details['image'] }}" class="img-fluid" alt="">
                   </a>
                   <div class="cart-content">
                       <a href="{{ route('product', $details['slug']) }}">
                           <h4>{{ $details['name'] }}</h4>
                       </a>
                       <div class="price">
                         <h4>$@convert($details['price'])
                           <span>(Total: $@convert($details['price'] * $details['quantity']))</span>
                         </h4>
                       </div>
                       <div class="select-size-sec d-flex justify-content-between">
                           <input type="number" value="{{ $details['quantity'] }}" class="form-control quantityf" style="width: 20%"/>
                           <div class="">
                             <button class="btn btn-success btn-sm update-cart" data-id="{{ $id }}"><i class="iconly-Plus icli"></i></button>
                             <!--<button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="iconly-Delete icli"></i></button>-->
                           </div>
                       </div>
                       <div class="cart-option">
                           <button class="btn btn-danger btn-sm text-white remove-from-cart" data-id="{{ $id }}" href="#" data-bs-toggle="offcanvas" data-bs-target="#removecart"><i class="iconly-Delete icli"></i>
                               Remove
                           </button>
                       </div>
                   </div>
               </div>
               <div class="divider"></div>

           @endforeach
       @endif
    </section>
    <!-- cart items end -->


    <!-- order details start -->
    <section id="order-details" class="px-15 pt-0">
      <?php $delivery = 10 ?>
        <h2 class="title">Order Details:</h2>
        <div class="order-details">
            <ul>
                <li>
                    <h4>Bag total <span>${{ $total }}</span></h4>
                </li>
                <li>
                    <h4>Delivery <span>${{ $delivery }}</span></h4>
                </li>
            </ul>
            <div class="total-amount">
                <h4>Total Amount <span>$@convert($delivery + $total)</span></h4>
            </div>
        </div>
    </section>
    <div class="divider"></div>
    <!-- order details end -->


    <!-- service section start -->
    <section class="service-wrapper px-15 pt-0">
        <div class="row">
            <div class="col-4">
                <div class="service-wrap">
                    <div class="icon-box">
                        <img src="{{ asset('static/svg/delivery.svg') }}" class="img-fluid" alt="">
                    </div>
                    <span>Fast Delivery</span>
                </div>
            </div>
            <div class="col-4">
                <div class="service-wrap">
                    <div class="icon-box">
                        <img src="{{ asset('static/svg/24-hours.svg') }}" class="img-fluid" alt="">
                    </div>
                    <span>24/7 Support</span>
                </div>
            </div>
            <div class="col-4">
                <div class="service-wrap">
                    <div class="icon-box">
                        <img src="{{ asset('static/svg/wallet.svg') }}" class="img-fluid" alt="">
                    </div>
                    <span>Secure Payment</span>
                </div>
            </div>
        </div>
    </section>
    <!-- service section end -->


    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->


    <!-- bottom panel start -->
    <div class="cart-bottom">
        <div>
            <div class="left-content">
                <h4>$@convert($delivery + $total)</h4>
                <a href="#order-details" class="theme-color">View details</a>
            </div>
            @if(session('cart'))
              <a href="{{ route('checkout') }}" class="btn btn-solid">Checkout</a>
            @else
              <a href="{{ route('home') }}" class="btn btn-solid">Continue Shopping</a>
            @endif
        </div>
    </div>
    <!-- bottom panel end -->

    @else
    <!-- empty cart start -->
    <section class="px-15">
        <div class="empty-cart-section text-center">
            <img src="{{ asset('static/images/empty-cart.png') }}" class="img-fluid" alt="">
            <h2>Whoops !! Cart is Empty</h2>
            <p>Looks like you haven’t add any products yet.</p>
            <a href="{{ route('home') }}" class="btn btn-solid w-100">start shopping</a>
        </div>
    </section>
    <!-- empty cart end -->

    @endif

@endsection
