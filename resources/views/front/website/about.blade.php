@extends('front.layouts.app')

@section('content')


    <!-- header start -->
    <header>
        <div class="back-links">
            <a href="index.html">
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
        <h4 class="mb-2">ZimboDelights is a premier food destination for the zimbos in diaspora.</h4>
        <p class="content-color">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
            interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also repr oduced
            in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
        <p class="content-color">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
            piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin
            professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, </p>
        <div class="about-stats">
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
        </div>
        <p class="content-color">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
            piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin
            professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, </p>
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
