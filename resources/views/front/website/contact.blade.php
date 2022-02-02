@extends('front.layouts.app')

@section('content')


    <!-- header start -->
    <header>
        <div class="back-links">
            <a href="{{ route('home') }}">
                <i class="iconly-Arrow-Left icli"></i>
                <div class="content">
                    <h2>contact us</h2>
                </div>
            </a>
          </div>
            <div class="header-option">
              <?php $footer_socials = session()->get('footer_socials') ?>
              @if(!$footer_socials)
              <ul>
                <li>
                  <a target="_blank" href="https://facebook.com/zimbodelights"><img src="{{ asset('static/images/icons/fb.svg') }}" width="22px" class="img-fluid" alt=""></a>
                </li>
                <li>
                  <a target="_blank" href="https://instagram.com/zimbo_delights"><img src="{{ asset('static/images/icons/insta.svg') }}" width="22px" class="img-fluid" alt=""></a>
                </li>
                <li>
                  <a target="_blank" href="https://twitter.com/zimbodelights"><img src="{{ asset('static/images/icons/tw.svg') }}" width="22px" class="img-fluid" alt=""></a>
                </li>
                <li>
                  <a target="_blank" href="https://wa.me/447535016221"><img src="{{ asset('static/images/icons/wh.svg') }}" width="22px" class="img-fluid" alt=""></a>
                </li>
              </ul>
              @else
              <ul>
                <li>
                  <a target="_blank" href="{{ $footer_socials->facebook }}"><img src="{{ asset('static/images/icons/fb.svg') }}" width="22px" class="img-fluid" alt=""></a>
                </li>
                <li>
                  <a target="_blank" href="{{ $footer_socials->instagram }}"><img src="{{ asset('static/images/icons/insta.svg') }}" width="22px" class="img-fluid" alt=""></a>
                </li>
                <li>
                  <a target="_blank" href="{{ $footer_socials->twitter }}"><img src="{{ asset('static/images/icons/tw.svg') }}" width="22px" class="img-fluid" alt=""></a>
                </li>
                <li>
                  <a target="_blank" href="{{ $footer_socials->whatsapp }}"><img src="{{ asset('static/images/icons/wh.svg') }}" width="22px" class="img-fluid" alt=""></a>
                </li>
              </ul>
              @endif
            </div>
    </header>
    <!-- header end -->

    <section class="px-15 top-space mt-5">
      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif
      <form action="{{ route('contact') }}" method="post" class="address-form-section px-15">
        @csrf
          <div class="mb-4">
            <h4 class="fw-bold mb-1">Send us your Query</h4>
          </div>
          <div class="form-floating mb-4">
              <input type="text" class="form-control" id="one" placeholder="Full Name" name="name">
              <label for="one">Full Name</label>
              <span class="text-danger">{{ $errors->first('name') }}</span>
          </div>
          <div class="form-floating mb-4">
              <input type="email" class="form-control" id="two" placeholder="Email Address" name="email">
              <label for="two">Email</label>
              <span class="text-danger">{{ $errors->first('email') }}</span>
          </div>
          <div class="mb-4">
              <label for="three">Message Detail</label>
              <textarea name="comment" class="form-control" rows="4" placeholder="Message body"></textarea>
              <span class="text-danger">{{ $errors->first('comment') }}</span>
          </div>

          <button type="submit" class="btn btn-solid w-100">Send Message</button>

      </form>
    </section>


    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->


    @include('front.partials.bottom-nav')

  @endsection
