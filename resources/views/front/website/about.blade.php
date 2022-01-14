@extends('front.layouts.app')

@section('content')


    <!-- header start -->
    <header>
        <div class="back-links">
            <a href="{{ route('home') }}">
                <i class="iconly-Arrow-Left icli"></i>
                <div class="content">
                    <h2>about us</h2>
                </div>
            </a>
        </div>
    </header>
    <!-- header end -->


    <!-- section start -->
    <section class="px-15 top-space pt-0">
        <h2 class="fw-bold mb-2">Introduction</h2>
        <div class="help-img">
            <img src="{{ asset('static/images/logo.png') }}" class="img-fluid rounded-1 mb-3 w-100" alt="">
        </div>
        <p class="content-color">Zimbabwe’s food products are world famous for their great tasting, no nonsense, honest to
          goodness flavours. From our chillies used in world famous flame grilled chicken peri peri
          sauces, to our coffees bought by international beverages chains and sold around the world,
          there is a mystical quality that brings this deep flavour, “ka-that”, to anything made in
          Zimbabwe.
        </p>
        <p class="content-color">The products sold here on ZimboDelight’s online pantry bring you the best of Zimbabwe,
          sourced straight from home, manufactured using familiar home grown ingredients and
          recipes and formulations we have all known from childhood.
        </p>
        <p class="content-color">ZimboDelights exists to share the rich tasting legacy of all the greatest products from
          Zimbabwe. Visit our online store for a fully stocked pantry of tasty delights that will remind
          you of the simple delights of a life only a Zimbo will know. Welcome to ZimboDelights, your
          honest to goodness, best of Zimbabwe pantry.
        </p>
        <!-- <div class="about-stats">
            <div class="row g-3 mb-4">
                <div class="col-md-4 col-6">
                    <div class="stats-box">
                        <div class="top-part">
                            <img src="{{ asset('static/svg/about/users.svg') }}" class="img-fluid" alt="">
                            <h2>150+ <span>users</span></h2>
                        </div>
                        <h6 class="content-color">ZimboDelights have 150+ register users online store</h6>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="stats-box">
                        <div class="top-part">
                            <img src="{{ asset('static/svg/about/stores.svg') }}" class="img-fluid" alt="">
                            <h2>50+ <span>stores</span></h2>
                        </div>
                        <h6 class="content-color">ZimboDelights have 50+ stores worldwide.</h6>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="stats-box">
                        <div class="top-part">
                            <img src="{{ asset('static/svg/about/delivery.svg') }}" class="img-fluid" alt="">
                            <h2>1.5M+ <span>orders</span></h2>
                        </div>
                        <h6 class="content-color">ZimboDelights has 1.5M+ total orders till now. </h6>
                    </div>
                </div>
            </div>
        </div> -->

        <h4 class="fw-bold mb-3">Talk to Us</h4>
        <p class="content-color">Sent us a message and get a quick reply through our <a href="{{ route('contact') }}">contact</a> page.</p>
    </section>
    <!-- section end -->

    <div class="divider"></div>
    <!-- brands section end -->


    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->


    @include('front.partials.bottom-nav')

  @endsection
