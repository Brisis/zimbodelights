@extends('front.layouts.app')

@section('content')


    <!-- header start -->
    <header>
        <div class="back-links">
            <a href="{{ route('buyer.dashboard') }}">
                <i class="iconly-Arrow-Left icli"></i>
                <div class="content">
                    <h2>Order History</h2>
                </div>
            </a>
        </div>
    </header>
    <!-- header end -->

    @if(auth()->user()->orders)

    <!-- section start -->
    <section class="px-15">
        <h2 class="page-title">Open Orders</h2>
        <ul class="order-listing">
          @foreach($pending as $order)
            <li>
                <div class="order-box">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('static/images/truck.gif') }}" class="img-fluid order-img" alt="">
                        <div class="media-body">
                            <h4>Order No: #{{ $order->id }}</h4>
                            <h5 class="content-color my-1">Price: £@convert($order->total)</h5>
                            <a class="theme-color" href="{{ route('buyer.order', $order->id) }}">View Details</a>
                        </div>
                        <span class="status-label">ongoing</span>
                    </div>
                    <div class="delivery-status">
                        <div class="d-flex">
                            <div>
                                <h6 class="content-color">Ordered:</h6>
                                <h6>{{ date('d/m/Y', strtotime($order->created_at)) }}</h6>
                            </div>
                            <div>
                                <h6 class="content-color">Delivery Status:</h6>
                                <h6>On the way</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
          @endforeach
        </ul>
    </section>
    <div class="divider"></div>
    <!-- section end -->


    <!-- section start -->
    <section class="section-b-space pt-0 px-15">
        <h2 class="page-title">Past Orders</h2>
        <ul class="order-listing">
          @foreach($delivered as $order)
            <li>
                <div class="order-box">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('static/images/truck.gif') }}" class="img-fluid order-img" alt="">
                        <div class="media-body">
                            <h4>Order No: #{{ $order->id }}</h4>
                            <h5 class="content-color my-1">Price: £@convert($order->total)</h5>
                            <a class="theme-color" href="{{ route('buyer.order', $order->id) }}">View Details</a>
                        </div>
                        <span class="status-label bg-theme text-white">delivered</span>
                    </div>
                    <div class="delivery-status">
                        <div class="d-flex">
                            <div>
                                <h6 class="content-color">Ordered:</h6>
                                <h6>{{ date('d/m/Y', strtotime($order->created_at)) }}</h6>
                            </div>
                            <div>
                                <h6 class="content-color">Delivery Status:</h6>
                                <h6>Delivered</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </section>
    <!-- section end -->

    @else
    <!-- empty cart start -->
    <section class="px-15">
        <div class="empty-cart-section text-center">
            <img src="{{ asset('static/images/empty-cart.png') }}" class="img-fluid" alt="">
            <h2>Whoops !! No Orders Yet</h2>
            <p>Looks like you haven’t made any orders yet.</p>
            <a href="{{ route('home') }}" class="btn btn-solid w-100">start shopping</a>
        </div>
    </section>
    <!-- empty cart end -->

    @endif

    @endsection
