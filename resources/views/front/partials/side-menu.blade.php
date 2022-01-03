<a href="javascript:void(0)" class="overlay-sidebar"></a>
<div class="header-sidebar">
  @auth
  <a href="{{ route('buyer.dashboard') }}" class="user-panel">

        @if(auth()->user()->profile_picture)
          <img src="{{ asset(auth()->user()->profile_picture) }}" alt="Picture" class="img-fluid user-img">
        @else
        <img src="{{ asset('static/images/ph.png') }}"
             class="img-fluid user-img" alt="image">
        @endif

      <span>Hello, {{ auth()->user()->name }}</span>


    <i class="iconly-Arrow-Right-2 icli"></i>
  </a>
  @endauth

  @guest
  <a href="{{ route('signin') }}" class="user-panel">
    <img src="{{ asset('static/images/ph.png') }}"
         class="img-fluid user-img" alt="image">
    <span>Hello there, Signin</span>
    <i class="iconly-Arrow-Right-2 icli"></i>
  </a>
  @endguest
  <div class="sidebar-content">
    <ul class="link-section">
      <li>
        <a href="{{ route('home') }}">
          <i class="iconly-Home icli"></i>
          <div class="content">
            <h4>Home</h4>
            <h6>ZimboDelights</h6>
          </div>
        </a>
      </li>
      <li>
        <a href="{{ route('categories.categories') }}">
          <i class="iconly-Category icli"></i>
          <div class="content">
            <h4>Categories</h4>
            <h6>Traditional, Cereals..</h6>
          </div>
        </a>
      </li>
      <li>
        <a href="{{ route('cart') }}">
          <i class="iconly-Buy icli"></i>
          <div class="content">
            <h4>Your Cart</h4>
            <h6>Your Saved Products</h6>
          </div>
        </a>
      </li>
    </ul>
    <div class="divider"></div>
    <ul class="link-section">
      <li>
        <a href="{{ route('about') }}">
          <i class="iconly-Info-Square icli"></i>
          <div class="content">
            <h4>About us</h4>
            <h6>About ZimboDelights</h6>
          </div>
        </a>
      </li>
      <li>
        <a href="{{ route('contact') }}">
          <i class="iconly-Call icli"></i>
          <div class="content">
            <h4>Contact Us</h4>
            <h6>Customer Support, FAQs</h6>
          </div>
        </a>
      </li>
      <li>
        <a href="{{ route('terms') }}">
          <i class="iconly-Document icli"></i>
          <div class="content">
            <h4>Terms & Conditions</h4>
            <h6>Privacy, etc.</h6>
          </div>
        </a>
      </li>
    </ul>
  </div>
</div>
<!-- header end -->
