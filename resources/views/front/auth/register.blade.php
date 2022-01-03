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
        <h1>Sign Up</h1>
        @if(session('status'))
          <div class="theme-color p-4 mb-3 text-center">
            {{ session('status') }}
          </div>
        @endif
        <form action="{{ route('signup') }}" method="post">
          @csrf
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="one" placeholder="Name" name="name" value="{{ old('name') }}">
                @error('name') <span style="color:#dc3545">( {{ $message }} )</span> @enderror
                <label for="one">Name</label>
            </div>
            <div class="form-floating mb-4">
                <input type="email" class="form-control" id="two" placeholder="Email" name="email" value="{{ old('email') }}">
                @error('email') <span style="color:#dc3545">( {{ $message }} )</span> @enderror
                <label for="two">Email</label>
            </div>
            <div class="form-floating mb-4">
                <input type="password" id="txtPassword" class="form-control" placeholder="password" name="password">
                @error('password') <span style="color:#dc3545">( {{ $message }} )</span> @enderror
                <label>Password</label>
            </div>
            <div class="form-floating mb-4">
                <input type="password" id="txtPassword" class="form-control" placeholder="confirm password" name="password_confirmation">
                @error('password_confirmation') <span style="color:#dc3545">( {{ $message }} )</span> @enderror
                <label>Confirm Password</label>
            </div>
            <button type="submit" class="btn btn-solid w-100">Sign UP</button>
        </form>
        <div class="or-divider">
            <span>Already have an Account? </span>
        </div>
        <div class="bottom-detail text-center mt-3">
            <h4 class="content-color"><a class="title-color text-decoration-underline"
                    href="{{ route('signin') }}">Sign In</a></h4>
        </div>
    </section>
    <!-- login section end -->


    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->



    @endsection
