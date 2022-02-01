@extends('front.layouts.app')

@section('content')


    <!-- header start -->
    <header>
        <div class="back-links">
            <a href="javascript:history.back()">
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

    @if(session('message'))
      <div class="alert alert-success">
        {{ session('message') }}
      </div>
    @endif

    @if(session('missing'))
      <div class="alert alert-danger">
        {{ session('missing') }}
      </div>
    @endif

    <!-- detail form start -->
    <section class="detail-form-section px-15">
        <h2 class="page-title mb-4">Personal Details</h2>
        <form method="post" action="{{ route('buyer.update_account') }}" id="update-form" enctype="multipart/form-data">
          @csrf
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="one" placeholder="Full Name" name="name" value="{{ auth()->user()->name }}" required>
                @error('name') <span style="color:#dc3545">( {{ $message }} )</span> @enderror
                <label for="one">*Full Name</label>
            </div>
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="email" placeholder="Email Address" name="email" value="{{ auth()->user()->email }}" disabled>
                <label for="one">*Email Address</label>
            </div>
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="two" placeholder="Delivery Address" name="address" value="{{ auth()->user()->address }}" required>
                @error('address') <span style="color:#dc3545">( {{ $message }} )</span> @enderror
                <label for="two">*Delivery Address</label>
            </div>
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="city" placeholder="City" name="city" value="{{ auth()->user()->city }}" required>
                @error('city') <span style="color:#dc3545">( {{ $message }} )</span> @enderror
                <label for="two">*City</label>
            </div>
            <div class="form-floating mb-4">
                @include('front.partials.countries')
                <label for="floatingSelect1">*Country (selected: {{ auth()->user()->country}})</label>
            </div>
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="postal" placeholder="Postal Code" name="zipcode" value="{{ auth()->user()->zipcode }}" required>
                @error('zipcode') <span style="color:#dc3545">( {{ $message }} )</span> @enderror
                <label for="two">*Zip / Postal code</label>
            </div>
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone" value="{{ auth()->user()->phone }}" required>
                @error('phone') <span style="color:#dc3545">( {{ $message }} )</span> @enderror
                <label for="two">*Phone</label>
            </div>
            <div class="form-floating mb-4">
                <input type="file" class="form-control" accept="image/*" name="image_path">
                @error('image_path') <span style="color:#dc3545">( {{ $message }} )</span> @enderror
                <label for="three">Account Picture (optional)</label>
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
                <a href="javascript:history.back()" class="title-color">BACK</a>
            </div>
            <a href="#" onclick="event.preventDefault(); document.getElementById('update-form').submit();" class="btn btn-solid col-7 text-uppercase">Save Details</a>
        </div>
    </div>
    <!-- bottom panel end -->

@endsection
