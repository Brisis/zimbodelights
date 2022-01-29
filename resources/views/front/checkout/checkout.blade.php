@extends('front.layouts.app')

@section('content')


    <!-- header start -->
    <header>
        <div class="back-links">
            <a href="{{ route('cart') }}">
                <i class="iconly-Arrow-Left icli"></i>
                <div class="content">
                    <h2>Payment Details</h2>
                    <h6>Step 2 of 2</h6>
                </div>
            </a>
        </div>
    </header>
    <!-- header end -->

    <!-- payment method start -->
    <section class="px-15 payment-method-section mt-5">
            <div class="card">
                <div class="card-header">
                  <div class="btn btn-link d-flex justify-content-between">
                      <label for='r_two'>
                         Make Payment
                      </label>
                      @if($temp_user || auth()->user())
                      <form id="reset-form" action="{{ route('reset_temp') }}" method="POST" hidden>
                          @csrf
                          @method('POST')
                      </form>
                      <a class="text-danger" href="#" onclick="event.preventDefault(); document.getElementById('reset-form').submit();">Reset Details</a>
                      @endif
                  </div>
                </div>
                <div>

                    <div class="card-body">
                     @if(session()->has('add_address'))
                      <div class="card-header">
                          <p>Please add your address in your Account Settings. Go <a class="badge badge-primary text-white" style="background: #FF4C3B;" href="{{ route('buyer.settings') }}">Here</a> to add now. </p>
                      </div>
                      @endif

                      <form class="pt-2" action="{{ route('create_order') }}" method="post" id="pay-form">
                        @csrf
                          @if(!$temp_user && !auth()->user())
                          <div class="form-floating mb-4">
                              <label for="c-name">Buyer Name</label>
                              <input type="text" class="form-control" id="buyer_name" placeholder="name of customer" name="buyer_name" required>
                          </div>
                          <div class="form-floating mb-4">
                              <label for="c-name">Email</label>
                              <input type="email" class="form-control" id="buyer_email" placeholder="your email" name="buyer_email" required>
                          </div>
                          <div class="form-floating mb-4">
                              <label for="c-name">Delivery Address</label>
                              <input type="text" class="form-control" id="buyer_address" placeholder="place of residence" name="buyer_address" required>
                          </div>
                          <div class="form-floating mb-4">
                              <select class="form-select" id="floatingSelect1" aria-label="Floating label select example" name="delivery_method" required>
                                  <option value="standard" selected>Standard</option>
                                  <option value="nextday">Next Day</option>
                              </select>
                              <label for="floatingSelect1">Delivery Options</label>
                          </div>
                          @else
                          <div class="form-floating mb-4">
                              <label for="c-name">Buyer Name</label>
                              <input type="text" class="form-control" readonly="readonly" id="buyer_name" placeholder="name of customer" name="buyer_name" @if(auth()->user()) value="{{ auth()->user()->name }}" @else value="{{ $temp_user['name'] }}" @endif>
                          </div>
                          <div class="form-floating mb-4">
                              <label for="c-name">Email</label>
                              <input type="email" class="form-control" readonly="readonly" id="buyer_email" placeholder="your email" name="buyer_email" @if(auth()->user()) value="{{ auth()->user()->email }}" @else value="{{ $temp_user['email'] }}" @endif>
                          </div>
                          <div class="form-floating mb-4">
                              <label for="c-name">Delivery Address</label>
                              <input type="text" class="form-control" readonly="readonly" id="buyer_address" placeholder="place of residence" name="buyer_address" @if(auth()->user()) value="{{ auth()->user()->address }}" @else value="{{ $temp_user['address'] }}" @endif>
                          </div>
                          <div class="form-floating mb-4">
                              <select class="form-select" id="floatingSelect1" aria-label="Floating label select example" name="delivery_method" required>
                                  <option value="standard" selected>Standard</option>
                                  <option value="nextday">Next Day</option>
                              </select>
                              <label for="floatingSelect1">Delivery Options</label>
                          </div>
                          @endif
                          @if(!session('curr_order')) <button class="btn btn-solid w-100 mb-3" type="submit">Proceed</button> @endif
                      </form>

                      @if(session('curr_order'))
                      <a class="btn btn-solid w-100 mb-3" href="{{ route('processTransaction') }}">Pay with PayPal</a>
                        @if(\Session::has('error'))
                            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                            {{ \Session::forget('error') }}
                        @endif
                        @if(\Session::has('success'))
                            <div class="alert alert-success">{{ \Session::get('success') }}</div>
                            {{ \Session::forget('success') }}
                        @endif

                      <p class="text-center mb-3">Or</p>

                      @if(Session::has('stripe_error'))
                        <div class="alert alert-danger" role="alert">
                          {{ Session::get('stripe_error') }}
                        </div>
                      @endif
                      <style>

                        input::placeholder {
                          color: grey !important;
                          padding-top: 10px;
                        }
                      </style>
                      <form action="{{ route('stripe_checkout') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-4">
                            <label for="cardnumber">Card Number</label>
                            <input type="text" class="form-control" id="cardnumber" placeholder="card number" name="cardnumber" >
                            @error('cardnumber') <span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-floating mb-4">
                            <label for="expirymonth">Expiry Month</label>
                            <input type="text" class="form-control" id="expirymonth" placeholder="mm" name="expirymonth" >
                            @error('expirymonth') <span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-floating mb-4">
                            <label for="expiryyear">Expiry Year</label>
                            <input type="text" class="form-control" id="expiryyear" placeholder="yyyy" name="expiryyear" >
                            @error('expiryyear') <span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-floating mb-4">
                            <label for="cvc">CVC</label>
                            <input type="password" class="form-control" id="cvc" placeholder="cvc" name="cvc" >
                            @error('cvc') <span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <button class="btn btn-solid w-100 mb-3" type="submit" id="checkout-button">Pay with Card</button>
                      </form>

                      @endif
                    </div>
                </div>
            </div>
    </section>


    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->



@endsection
