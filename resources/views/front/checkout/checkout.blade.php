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
                        @if($temp_user)
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



                        <form class="pt-2" method="post" id="pay-form">

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
                            @endif
                            <button class="btn btn-solid w-100 mb-3" type="submit" id="pay-btn">Proceed</button>
                        </form>

                        <script src="https://www.paypal.com/sdk/js?client-id=AcrOZt6Rw80zBVhP3Dy7Z5u523y3MXOKdmhCEJlFh7784gxfFXo5HzBRQ80WZtJw1InLfYe7Zcxyx8z4&currency=USD"></script>


                        <!-- Set up a container element for the button -->
                        <div id="paypal-button-container"></div>


                        <script>



                        function logSubmit(event) {
                          var buyer_name = document.getElementById("buyer_name").value;
                          var buyer_email = document.getElementById("buyer_email").value;
                          var buyer_address = document.getElementById("buyer_address").value;

                          event.preventDefault();

                          document.getElementById("pay-btn").hidden = true;

                          paypal.Buttons({

                            // Sets up the transaction when a payment button is clicked
                            createOrder: function(data, actions) {
                              return actions.order.create({
                                purchase_units: [{
                                  amount: {
                                    value: '@convert($total)'// Can reference variables or functions. Example: `value: document.getElementById('...').value`
                                  }
                                }]
                              });
                            },

                            // Finalize the transaction after payer approval
                            onApprove: function(data, actions) {
                              return actions.order.capture().then(function(orderData) {
                                // Successful capture! For dev/demo purposes:
                                $.ajax({
                                   url: '/create_order',
                                   method: "POST",
                                   data: {
                                     _token: '{{ csrf_token() }}',
                                     "buyer_name": buyer_name,
                                     "buyer_email": buyer_email,
                                     "buyer_address": buyer_address
                                   },
                                   success: function (response) {
                                     window.location.replace("/checkout_done");
                                       //window.location.href = "/checkout_done";
                                   }
                                });

                              });
                            }
                          }).render('#paypal-button-container');
                        }

                        const form = document.getElementById('pay-form');
                        form.addEventListener('submit', logSubmit);
                      </script>
                    </div>
                </div>
            </div>
    </section>


    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->



@endsection
