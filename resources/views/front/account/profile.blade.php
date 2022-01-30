@extends('front.layouts.app')

@section('content')


    <!-- header start -->
    <header>
        <div class="back-links">
            <a href="{{ route('home') }}">
                <i class="iconly-Arrow-Left icli"></i>
                <div class="content">
                    <h2>My Profile</h2>
                </div>
            </a>
        </div>
    </header>
    <!-- header end -->


    <!-- profile section start -->
    <section class="top-space pt-0">
        <div class="profile-detail">
            <div class="media">
                @if(auth()->user()->profile_picture)
                  <img src="{{ asset(auth()->user()->profile_picture) }}" alt="Picture" class="img-fluid">
                @else
                <img src="{{ asset('static/images/ph.png') }}"
                     class="img-fluid user-img" alt="image">
                @endif
                <div class="media-body">
                    <h2>{{ auth()->user()->name }}</h2>
                    <h6>{{ auth()->user()->email }}</h6>
                    <a href="{{ route('buyer.settings') }}" class="edit-btn">Edit</a>
                </div>
            </div>
        </div>
    </section>
    <!-- profile section end -->


    <!-- link section start -->
    <div class="sidebar-content">
        <ul class="link-section">
          @if(auth()->user()->is_admin)
          <li>
              <a href="{{ route('admin.dashboard') }}">
                  <i class="iconly-Lock icli"></i>
                  <div class="content">
                      <h4>Administration</h4>
                      <h6>Go to Admin Dashboard</h6>
                  </div>
              </a>
          </li>
          @endif
            <li>
                <a href="{{ route('buyer.orders') }}">
                    <i class="iconly-Document icli"></i>
                    <div class="content">
                        <h4>Orders</h4>
                        <h6>Ongoing Orders, Recent Orders..</h6>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('cart') }}">
                    <i class="iconly-Heart icli"></i>
                    <div class="content">
                        <h4>Your Cart</h4>
                        <h6>Your Saved Products</h6>
                    </div>
                </a>
            </li>
            <!--<li>
                <a href="{{ route('buyer.dashboard') }}">
                    <i class="iconly-Password icli"></i>
                    <div class="content">
                        <h4>Profile settings</h4>
                        <h6>Full Name, Password..</h6>
                    </div>
                </a>
            </li>-->
        </ul>
        <div class="divider"></div>
        <ul class="link-section">
            <li>
                <a href="{{ route('terms') }}">
                    <i class="iconly-Info-Square icli"></i>
                    <div class="content">
                        <h4>Terms & Conditions</h4>
                        <h6>T&C for use of Platform</h6>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}">
                    <i class="iconly-Call icli"></i>
                    <div class="content">
                        <h4>Help/Customer Care</h4>
                        <h6>Customer Support, FAQs</h6>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="px-15">
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-outline w-100 content-color">LOG OUT</a>
    </div>
    <!-- link section end -->

    <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
        @csrf
        @method('POST')
    </form>

    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->


    @include('front.partials.bottom-nav')


    @endsection
