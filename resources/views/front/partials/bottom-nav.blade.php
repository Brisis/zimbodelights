<!-- bottom panel start -->
<div class="bottom-panel">  {{ request()->routeIs('account.*') ? 'active' : '' }}
  <ul>
    <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
      <a href="{{ route('home') }}">
        <div class="icon">
          <i class="iconly-Home icli"></i>
          <i class="iconly-Home icbo"></i>
        </div>
        <span>home</span>
      </a>
    </li>
    <li class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
      <a href="{{ route('categories.categories') }}">
        <div class="icon">
          <i class="iconly-Category icli"></i>
          <i class="iconly-Category icbo"></i>
        </div>
        <span>categories</span>
      </a>
    </li>
    <li class="{{ request()->routeIs('cart') ? 'active' : '' }}">
      <a href="{{ route('cart') }}">
        <div class="icon">
          <i class="iconly-Buy icli"></i>
          <i class="iconly-Buy icbo"></i>
        </div>
        <span>cart @if(session('cart'))( {{ count(session('cart')) }} )@endif</span>
      </a>
    </li>
    <li class="{{ request()->routeIs('buyer.*') ? 'active' : '' }}">
      <a href="{{ route('buyer.dashboard') }}">
        <div class="icon">
          <i class="iconly-Profile icli"></i>
          <i class="iconly-Profile icbo"></i>
        </div>
        <span>profile</span>
      </a>
    </li>
  </ul>
</div>
<!-- bottom panel end -->
