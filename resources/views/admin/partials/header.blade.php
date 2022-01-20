<!-- header -->
<div class="header">
<div class="menu-toggle-btn"> <!-- Menu close button for mobile devices -->
    <a href="#">
        <i class="bi bi-list"></i>
    </a>
</div>
<!-- Logo -->
<a href="{{ route('admin.dashboard') }}" class="logo">
    <img width="100" src="{{ asset('static/images/logo.png') }}" alt="logo">
</a>
<!-- ./ Logo -->
<div class="page-title">Overview</div>

<div class="header-bar ms-auto">
    <ul class="navbar-nav justify-content-end">
        <!-- <li class="nav-item">
            <a href="#" class="nav-link nav-link-notify" data-count="0">
                <i class="bi bi-bell icon-lg"></i>
            </a>
        </li> -->
        <li class="nav-item ms-3">
                <a href="{{ route('admin.products.add_product') }}" class="btn btn-primary btn-icon">
                    <i class="bi bi-plus-circle"></i> Add Product
                </a>
        </li>
    </ul>
</div>
<!-- Header mobile buttons -->
<div class="header-mobile-buttons">
    <a href="#" class="search-bar-btn">
        <i class="bi bi-search"></i>
    </a>
    <a href="#" class="actions-btn">
        <i class="bi bi-three-dots"></i>
    </a>
</div>
<!-- ./ Header mobile buttons -->
</div>
<!-- ./ header -->
