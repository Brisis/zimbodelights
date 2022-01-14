@extends('front.layouts.app')

@section('content')


    <!-- header start -->
    <header>
        <div class="back-links">
            <a href="{{ route('home') }}">
                <i class="iconly-Arrow-Left icli"></i>
                <div class="content">
                    <h2>Back Home</h2>
                </div>
            </a>
        </div>
    </header>
    <!-- header end -->


    <!-- empty cart start -->
    <section class="px-15">
        <div class="empty-cart-section text-center">
            <h2>Subscribed to Newsletter</h2>
            <p>Congratulations, you are now subscribed to our newsletter.</p>
            <a href="{{ route('home') }}" class="btn btn-solid w-100">continue shopping</a>
        </div>
    </section>
    <!-- empty cart end -->


    @endsection
