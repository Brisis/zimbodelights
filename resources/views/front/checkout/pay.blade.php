@extends('front.layouts.app')

@section('content')

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
                <div class="card-body">
                  <script src="https://www.paypal.com/sdk/js?client-id=AcrOZt6Rw80zBVhP3Dy7Z5u523y3MXOKdmhCEJlFh7784gxfFXo5HzBRQ80WZtJw1InLfYe7Zcxyx8z4&currency=USD"></script>

                  <!-- Set up a container element for the button -->
                  <div id="paypal-button-container"></div>

                  <script>

                  paypal.Buttons({

                    // Sets up the transaction when a payment button is clicked
                    createOrder: function(data, actions) {
                      return actions.order.create({
                        purchase_units: [{
                          amount: {
                            value: '{{ $order->total }}' // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                          }
                        }]
                      });
                    },

                    // Finalize the transaction after payer approval
                    onApprove: function(data, actions) {
                      return actions.order.capture().then(function(orderData) {
                        // Successful capture! For dev/demo purposes:
                        $.ajax({
                           url: '/checkout',
                           method: "POST",
                           data:
                           success: function (response) {
                               window.location.ref('/checkout_done');
                           }
                        });

                      });
                    }
                  }).render('#paypal-button-container');

                </script>
                <!-- <script>
                    // Render the PayPal button into #paypal-button-container
                    var myOrder = {{ $order->id }};

                    paypal.Buttons({

                    // Call your server to set up the transaction
                    createOrder: function(data, actions) {
                      return fetch('api/paypal/order/create/', {
                          method: 'post',
                          header: "Set-Cookie: cross-site-cookie=whatever; SameSite=None; Secure",
                          body: JSON.stringify({
                            value: myOrder
                          })
                      }).then(function(res) {
                          return res.json();
                      }).then(function(orderData) {
                          return orderData.id;
                      });
                    },

                    // Call your server to finalize the transaction
                    onApprove: function(data, actions) {
                      return fetch('api/paypal/order/capture/', {
                          method: 'post',
                          body: JSON.stringify({
                            orderId: data.orderID
                          })
                      }).then(function(res) {
                          return res.json();
                      }).then(function(orderData) {
                          // Three cases to handle:
                          //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                          //   (2) Other non-recoverable errors -> Show a failure message
                          //   (3) Successful transaction -> Show confirmation or thank you

                          // This example reads a v2/checkout/orders capture response, propagated from the server
                          // You could use a different API or structure for your 'orderData'
                          var errorDetail = Array.isArray(orderData.details) && orderData.details[0];

                          if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                              return actions.restart(); // Recoverable state, per:
                              // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                          }

                          if (errorDetail) {
                              var msg = 'Sorry, your transaction could not be processed.';
                              if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                              if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
                              return alert(msg); // Show a failure message (try to avoid alerts in production environments)
                          }

                          // Successful capture! For demo purposes:
                          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                          var transaction = orderData.purchase_units[0].payments.captures[0];
                          alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                          // Replace the above to show a success message within this page, e.g.
                          // const element = document.getElementById('paypal-button-container');
                          // element.innerHTML = '';
                          // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                          // Or go to another URL:  actions.redirect('thank_you.html');
                      });
                    }

                    }).render('#paypal-button-container');
                    </script>
                            </div>
                        </div>
                </section> -->


    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->




@endsection
