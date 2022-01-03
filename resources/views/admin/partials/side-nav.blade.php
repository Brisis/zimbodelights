<!-- menu -->
<div class="menu">
    <div class="menu-header">
        <a href="{{ route('admin.dashboard') }}" class="menu-header-logo">
            <img src="{{ asset('static/images/logo.png') }}" alt="logo">
        </a>
        <a href="index.html" class="btn btn-sm menu-close-btn">
            <i class="bi bi-x"></i>
        </a>
    </div>
    <div class="menu-body">
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center" data-bs-toggle="dropdown">
                <div class="avatar me-3">
                  @if(auth()->user()->profile_picture)
                    <img src="{{ asset(auth()->user()->profile_picture) }}" alt="Picture" class="rounded-circle">
                  @else
                  <img src="{{ asset('static/images/ph.png') }}"
                       class="rounded-circle" alt="image">
                  @endif

                </div>
                <div>
                    <div class="fw-bold">{{ auth()->user()->name }}</div>
                    <small class="text-muted">Administrator</small>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="./login.html" class="dropdown-item d-flex align-items-center text-danger"
                   target="_blank">
                    <i class="bi bi-box-arrow-right dropdown-item-icon"></i> Logout
                </a>
            </div>
        </div>
        <ul>
            <li class="menu-divider">Admin</li>
            <li>
                <a class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <span class="nav-link-icon">
                        <i class="bi bi-bar-chart"></i>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.categories') }}">
                    <span class="nav-link-icon">
                        <i class="bi bi-box"></i>
                    </span>
                    <span>Categories</span>
                </a>
            </li>
            <li>
                <a class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}" href="{{ route('admin.products.products') }}">
                    <span class="nav-link-icon">
                        <i class="bi bi-basket"></i>
                    </span>
                    <span>Products</span>
                </a>
            </li>
            <li>
                <a class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}" href="{{ route('admin.orders.orders') }}">
                    <span class="nav-link-icon">
                        <i class="bi bi-receipt"></i>
                    </span>
                    <span>Orders</span>
                </a>
            </li>

            <li class="menu-divider">Settings</li>
            <li>
                <a class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.settings') }}">
                    <span class="nav-link-icon">
                        <i class="bi bi-gear"></i>
                    </span>
                    <span>Settings</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- ./  menu -->
