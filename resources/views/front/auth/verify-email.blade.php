@extends('front.layouts.app')

@section('content')


    <!-- top design start -->
    <img src="{{ asset('static/images/design.svg') }}" class="img-fluid design-top" alt="">
    <!-- top design end -->


    <!-- top bar start -->
    <div class="topbar-section">
        <a href="{{ route('home') }}"><img src="{{ asset('static/images/logo.png') }}" class="img-fluid" alt=""></a>
        <a class="skip-cls" href="{{ route('home') }}">SKIP</a>
    </div>
    <!-- top bar end -->


    <!-- login section start -->
    <section class="form-section px-15 top-space section-b-space">
        <h1>Verify Your Email</h1>
        @if(session('message'))
          <div class="theme-color p-4 mb-3 text-center">
            {{ session('message') }}
          </div>
        @endif
        <p>A verification email was sent to <b style="color: #FF4C3B;">{{auth()->user()->email}}</b> </p>
        <form action="{{ route('verification.send') }}" method="post">
          @csrf
            <button type="submit" class="btn btn-solid w-100">Resend Verification</button>
        </form>

    </section>
    <!-- login section end -->


    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->



    @endsection
