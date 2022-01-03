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
        <h1>Sign In</h1>
        @if(session('status'))
          <div class="theme-color p-4 mb-3 text-center">
            {{ session('status') }}
          </div>
        @endif
        <form action="{{ route('signin') }}" method="post">
          @csrf
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="one" placeholder="Email" name="email" value="{{ old('email') }}">
                @error('email') <span style="color:#dc3545">( {{ $message }} )</span> @enderror
                <label for="one">Email</label>
            </div>
            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="two" placeholder="password" name="password">
                @error('email') <span style="color:#dc3545">( {{ $message }} )</span> @enderror
                <label for="two">Password</label>
            </div>
            <div class="form-group mb-2">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            </div>
            <div class="text-end mb-4">
                <a href="{{ route('home') }}" class="theme-color">Forgot Password ?</a>
            </div>
            <button type="submit" class="btn btn-solid w-100">Sign in</button>
        </form>
        <div class="or-divider">
            <span>Or If you are new,</span>
        </div>
        <div class="bottom-detail text-center mt-3">
            <h4 class="content-color"><a class="title-color text-decoration-underline"
                    href="{{ route('signup') }}">Create Account Now</a></h4>
        </div>
    </section>
    <!-- login section end -->


    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->



    @endsection
