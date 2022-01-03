@extends('front.layouts.app')

@section('content')
<script src="https://js.stripe.com/v3/"></script>

    <!-- header start -->
    <header>
        <div class="back-links">
            <a href="{{ route('cart') }}">
                <i class="iconly-Arrow-Left icli"></i>
                <div class="content">
                    <h2>Make Payment</h2>
                    <h6>Step 4 of 4</h6>
                </div>
            </a>
        </div>
    </header>
    <!-- header end -->

    <!-- payment method start -->
    <section class="px-15 payment-method-section mt-5">
            <div class="card">
                <div class="card-header">
                    <div class="btn btn-link">
                        <label for='r_two' class="text-success">
                            Order Created
                        </label>
                    </div>
                    <div class="btn btn-link">
                        <label for='r_two'>
                            <img src="{{ asset('static/images/payment/1.png') }}" class="img-fluid" alt="">Complete Checkout
                        </label>
                    </div>
                </div>
                <div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
    </section>


    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->


    <!-- bottom panel start -->
    <div class="cart-bottom">
        <div>
            <div class="left-content">
                <h4><a href="{{ route('cart') }}" class="theme-color">CANCEL</a></h4>

            </div>
            <a href="#" id="checkout-button" class="btn btn-solid">Pay Now</a>
            <script>
              var stripe = Stripe('pk_test_Vj5wRiSK3nnTN3hzxvOkAWvB00Gm2W8NIz');
              const btn = document.getElementById("checkout-button")
              btn.addEventListener('click', function(e) {
                e.preventDefault();
                stripe.redirectToCheckout({
                  sessionId: "<?php echo $session->id; ?>"
                });
              });
            </script>
        </div>
    </div>
    <!-- bottom panel end -->


@endsection
