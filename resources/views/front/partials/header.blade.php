<header style="background-color: #eee !important;">
  <div class="nav-bar">
    <img src="{{ asset('static/svg/bar.svg') }}" class="img-fluid" alt="">
  </div>
  <a href="{{ route('home') }}" class="brand-logo">
    <img src="{{ asset('static/images/logo.png') }}" class="img-fluid" alt="">
  </a>
  <div class="header-option">
    <ul>
      <!-- search panel start -->
      <div class="search-panel xl-space px-15">
        <div class="search-bar" style="width:100%;">
          <form class="" action="{{ route('search') }}" method="get">
                <input class="form-control form-theme" style="background: white" placeholder="Search" name="search">
                <i class="iconly-Search icli search-icon"></i>
          </form>
        </div>
      </div>
      <li>
        <a href="{{ route('cart') }}">
          <style media="screen">
          .badge {
            padding-left: 9px;
            padding-right: 9px;
            -webkit-border-radius: 9px;
            -moz-border-radius: 9px;
            border-radius: 9px;
            }

            .label-warning[href],
            .badge-warning[href] {
            background-color: #c67605;
            }
            #lblCartCount {
              font-size: 12px;
              background: #ff0000;
              color: #fff;
              padding: 0 5px;
              vertical-align: top;
              margin-left: -10px;
            }
          </style>
          <i class="iconly-Buy icli"></i>
          <span class='badge badge-warning' id='lblCartCount'>@if(session('cart')) {{ count(session('cart')) }} @endif</span>
        </a>
      </li>
      <li>

        @if(auth()->user())
        <a href="{{ route('buyer.dashboard')}}">
          <i class="iconly-Profile icli"></i>
          My Account
        </a>
        @else
        <a href="{{ route('signin')}}">
          <i class="iconly-Profile icli"></i>
          Log In
        </a>
        @endif
      </li>
    </ul>
  </div>
</header>
