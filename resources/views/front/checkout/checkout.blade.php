@extends('front.layouts.app')

@section('content')


    <!-- header start -->
    <header>
        <div class="back-links">
            <a href="#!">
                <div class="content">
                    <h2>Payment Details</h2>
                    <h6>Step 2 of 2</h6>
                </div>
            </a>
        </div>
        <div class="header-option">
            <ul>
                <li>
                    <a href="{{ route('home') }}" class="text-primary">Continue Shopping</a>
                </li>
            </ul>
        </div>
    </header>
    <!-- header end -->

    <?php $current_order = session('curr_order') ?>
    <div>
      <?php $total = 0; $weight = 0; ?>
       @if(session('cart'))
           @foreach(session('cart') as $id => $details)
               <?php $total += $details['price'] * $details['quantity'] ?>
               <?php $weight += $details['weight'] ?>
           @endforeach
       @endif
    </div>

    <?php
      $nextday = 0;
      $standard = 0;

      if ($weight < 1000) {
        $nextday = 4.06;
        $standard = 3.67;
      }
      elseif ($weight >= 1000 && $weight <= 2000) {
        $nextday = 5.50;
        $standard = 5.12;
      }
      elseif ($weight > 2000 && $weight <= 5000) {
        $nextday = 6.90;
        $standard = 6.64;
      }
      elseif ($weight > 5000 && $weight <= 10000) {
        $nextday = 8.08;
        $standard = 7.82;
      }
      else {
        $nextday = 9.71;
        $standard = 9.44;
      }

     ?>

    <!-- payment method start -->

    <div class="row mt-5">
      <div class="col-md-6 col-12">
        <section class="payment-method-section">
            <div class="card">
                <div class="card-header">
                  <div class="btn btn-link d-flex justify-content-between">
                      <label for='r_two'>
                         Complete Checkout
                      </label>
                      @if(!session('curr_order'))

                        @if($temp_user || auth()->user())
                        @if($temp_user)
                          <form id="reset-form" action="{{ route('reset_temp') }}" method="POST" hidden>
                              @csrf
                              @method('POST')
                          </form>
                          <a class="text-danger" href="#" onclick="event.preventDefault(); document.getElementById('reset-form').submit();">Change Details</a>
                          @else
                          <a class="text-danger" href="{{ route('buyer.settings') }}">Change Details</a>
                        @endif
                        @endif

                      @else
                      <form id="reset-checkout" action="{{ route('reset_checkout') }}" method="POST" hidden>
                          @csrf
                          @method('POST')
                      </form>
                      <a class="text-danger" href="#" onclick="event.preventDefault(); document.getElementById('reset-checkout').submit();">Change Details</a>
                      @endif
                  </div>
                </div>
                    <div class="card-body">
                      @if(!session('curr_order'))
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
                              <input type="text" class="form-control" id="city" placeholder="City" name="city" required>
                              <label for="two">*City</label>
                          </div>
                          <div class="form-floating mb-4">
                              @include('front.partials.countries')
                              <label for="floatingSelect1">*Country</label>
                          </div>
                          <div class="form-floating mb-4">
                              <input type="text" class="form-control" id="postal" placeholder="Postal Code" name="zipcode" required>
                              <label for="two">*Zip / Postal code</label>
                          </div>
                          <div class="form-floating mb-4">
                              <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone" required>
                              <label for="two">*Phone</label>
                          </div>
                          <div class="form-floating mb-4">
                              <select class="form-select" id="floatingSelect1" style="padding-top: 15px !important;" aria-label="Options" name="delivery_method" required>
                                  <option value="standard" selected>Standard (£@convert($standard))</option>
                                  <option value="nextday">Next Day (£@convert($nextday))</option>
                              </select>
                              <label for="floatingSelect1">Delivery Options</label>
                          </div>
                          @else
                          <div class="form-floating mb-4">
                              <label for="c-name">Buyer Name</label>
                              <input type="text" class="form-control" readonly="readonly" id="buyer_name" placeholder="name of customer" name="buyer_name" required @if(auth()->user()) value="{{ auth()->user()->name }}" @else value="{{ $temp_user['name'] }}" @endif>
                          </div>
                          <div class="form-floating mb-4">
                              <label for="c-name">Email</label>
                              <input type="email" class="form-control" readonly="readonly" id="buyer_email" placeholder="your email" name="buyer_email" required @if(auth()->user()) value="{{ auth()->user()->email }}" @else value="{{ $temp_user['email'] }}" @endif>
                          </div>
                          <div class="form-floating mb-4">
                              <label for="c-name">Delivery Address</label>
                              <input type="text" class="form-control" readonly="readonly" id="buyer_address" placeholder="place of residence" name="buyer_address" required @if(auth()->user()) value="{{ auth()->user()->address }}" @else value="{{ $temp_user['address'] }}" @endif>
                          </div>
                          <div class="form-floating mb-4">
                              <input type="text" class="form-control" readonly="readonly" id="city" placeholder="City" name="city" required @if(auth()->user()) value="{{ auth()->user()->city }}" @else value="{{ $temp_user['city'] }}" @endif>
                              <label for="two">*City</label>
                          </div>
                          <div class="form-floating mb-4">
                              <input type="text" class="form-control" readonly="readonly" id="country" placeholder="Country" name="country" required @if(auth()->user()) value="{{ auth()->user()->country }}" @else value="{{ $temp_user['country'] }}" @endif>
                              <label for="floatingSelect1">*Country</label>
                          </div>
                          <div class="form-floating mb-4">
                              <input type="text" class="form-control" readonly="readonly" id="postal" placeholder="Postal Code" name="zipcode" required @if(auth()->user()) value="{{ auth()->user()->zipcode }}" @else value="{{ $temp_user['zipcode'] }}" @endif>
                              <label for="two">*Zip / Postal code</label>
                          </div>
                          <div class="form-floating mb-4">
                              <input type="text" class="form-control" readonly="readonly" id="phone" placeholder="Phone Number" name="phone" required @if(auth()->user()) value="{{ auth()->user()->phone }}" @else value="{{ $temp_user['phone'] }}" @endif>
                              <label for="two">*Phone</label>
                          </div>
                          <div class="form-floating mb-4">
                              <select class="form-select" style="padding-top: 15px !important;" id="floatingSelect1" aria-label="Options" name="delivery_method" required>
                                <option value="standard" selected>Standard (£@convert($standard))</option>
                                <option value="nextday">Next Day (£@convert($nextday))</option>
                              </select>
                              <label for="floatingSelect1">Delivery Options</label>
                          </div>
                          @endif
                          <input type="text" name="subtotal" value="{{ $total }}" hidden>
                          <input type="text" name="weight" value="{{ $weight }}" hidden>

                          <button class="btn btn-solid w-100 mb-3" type="submit">Proceed</button>
                      </form>
                      @endif

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
        </section>
      </div>

      <div class="col-md-6 col-12">
        <section class="payment-method-section">
          <div class="card">
            <div class="card-header">
              <div class="btn btn-link d-flex justify-content-between">
                  <label for='r_two'>
                     Order Summary
                  </label>
                  @if(!session('curr_order')) <a class="text-danger" href="{{ route('cart') }}">Edit Cart</a> @endif
              </div>
            </div>
            <div class="card-body">
              <!-- cart items start -->
              <section class="cart-section pt-0 xl-space">
                 @if(session('cart'))
                     @foreach(session('cart') as $id => $details)
                         <div class="cart-box px-15" data-id="{{ $id }}">
                             <a href="{{ route('product', $details['slug']) }}" class="cart-img">
                                 <img src="{{ $details['image'] }}" class="img-fluid" alt="">
                             </a>
                             <div class="cart-content">
                                 <a href="{{ route('product', $details['slug']) }}">
                                     <h4>{{ $details['name'] }}</h4>
                                 </a>
                                 <p>Quantity: {{ $details['quantity'] }}</p>
                                 <div class="price">
                                   <h4>£@convert($details['price'])
                                     <span>(Total: £@convert($details['price'] * $details['quantity']))</span>
                                   </h4>
                                 </div>
                             </div>
                         </div>
                         <div class="divider"></div>
                     @endforeach
                 @endif
              </section>
              <!-- cart items end -->

              <!-- order details start -->
              <section id="order-details" class="px-15 pt-0">
                  <div class="order-details">
                      <ul>
                          <li>
                              <h4>Items <span>£{{ $total }}</span></h4>
                          </li>

                          <li>
                              <h4>Shipping <span> @if($current_order) £@convert($current_order->delivery_fees) @else £@convert($standard) @endif</span></h4>
                          </li>
                      </ul>
                      <div class="total-amount">
                          <h4>Total Amount <span> @if($current_order) £@convert($current_order->delivery_fees + $total) @else £@convert($standard + $total) @endif</span></h4>
                      </div>
                  </div>
              </section>
              <div class="divider"></div>
              <!-- order details end -->
            </div>
          </div>
        </section>
      </div>

    </div>


    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->



@endsection
