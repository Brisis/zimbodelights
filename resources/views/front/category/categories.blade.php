@extends('front.layouts.app')

@section('content')


    <!-- header start -->
    <header>
        <div class="back-links">
            <a href="{{ route('home') }}">
                <i class="iconly-Arrow-Left icli"></i>
                <div class="content">
                    <h2>Categories</h2>
                </div>
            </a>
        </div>
        <div class="header-option">
            <ul>
                <li>
                    <a href="{{ route('cart') }}"><i class="iconly-Buy icli"></i></a>
                </li>
            </ul>
        </div>
    </header>
    <!-- header end -->


    <!-- category start -->
    <section class="category-listing px-15 lg-space top-space pt-5">
        @foreach($categories as $category)
          <a href="{{ route('categories.category', $category->slug) }}" class="category-wrap">
              <div class="content-part">
                  <h2 class="text-uppercase">{{ $category->name }}</h2>
                  <h4> {{ count($category->products) }} items</h4>
              </div>
              <div class="img-part">
                  <img src="{{ asset($category->picture) }}" class="img-fluid" alt="">
              </div>
          </a>
        @endforeach
    </section>
    <!-- category end -->


    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->


    @include('front.partials.bottom-nav')


    @endsection
