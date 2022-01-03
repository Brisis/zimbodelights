@extends('front.layouts.app')

@section('content')


    <!-- header start -->
    <header>
        <div class="back-links">
            <a href="{{ route('buyer.dashboard') }}">
                <i class="iconly-Arrow-Left icli"></i>
                <div class="content">
                    <h2>Profile Setting</h2>
                </div>
            </a>
        </div>
    </header>
    <!-- header end -->


    <!-- user avtar section -->
    <section class="user-avtar-section top-space pt-0 px-15">
        @if(auth()->user()->profile_picture)
          <img src="{{ asset(auth()->user()->profile_picture) }}" alt="Picture" class="img-fluid">
        @else
        <img src="{{ asset('static/images/ph.png') }}"
             class="img-fluid" alt="image">
        @endif
        <span class="edit-icon"><i class="iconly-Edit-Square icli"></i></span>
    </section>
    <!-- user avtar end -->


    <!-- detail form start -->
    <section class="detail-form-section px-15">
        <h2 class="page-title mb-4">Personal Details</h2>
        <form method="post" action="{{ route('buyer.update_account') }}" id="update-form" enctype="multipart/form-data">
          @csrf
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="one" placeholder="Full Name" name="name" value="{{ auth()->user()->name }}">
                <label for="one">Full Name</label>
            </div>
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="two" placeholder="Delivery Address" name="address" value="{{ auth()->user()->address }}">
                <label for="two">Delivery Address</label>
            </div>
            <div class="form-floating mb-4">
                <input type="file" class="form-control" accept="image/*" name="image_path">
                <label for="three">Account Picture</label>
            </div>
        </form>
    </section>


    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->


    <!-- bottom panel start -->
    <div class="cart-bottom row m-0">
        <div>
            <div class="left-content col-5">
                <a href="{{ route('buyer.dashboard') }}" class="title-color">BACK</a>
            </div>
            <a href="#" onclick="event.preventDefault(); document.getElementById('update-form').submit();" class="btn btn-solid col-7 text-uppercase">Save Details</a>
        </div>
    </div>
    <!-- bottom panel end -->

@endsection
