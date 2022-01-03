@extends('front.layouts.app')

@section('content')


    <!-- header start -->
    <header>
        <div class="back-links">
            <a href="{{ route('cart') }}">
                <i class="iconly-Arrow-Left icli"></i>
                <div class="content">
                    <h2>Payment Details</h2>
                    <h6>Step 3 of 4</h6>
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
                        <label for='r_two'>
                           Add your Order
                        </label>
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
                          @method('POST')
                            @if(!auth()->user() && !$temp_user)
                            <div class="form-floating mb-4">
                                <label for="c-name">Buyer Name</label>
                                <input type="text" class="form-control" id="c-name" placeholder="name of customer" name="buyer_name">
                            </div>
                            <div class="form-floating mb-4">
                                <label for="c-name">Email</label>
                                <input type="email" class="form-control" id="c-email" placeholder="your email" name="buyer_email">
                            </div>
                            <div class="form-floating mb-4">
                                <label for="c-name">Delivery Address</label>
                                <input type="text" class="form-control" placeholder="place of residence" name="buyer_address">
                            </div>
                            @endif
                        </form>
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
                <h4>Total: $@convert($total)</h4>
                <a href="{{ route('cart') }}#order-details" class="theme-color">View details</a>
            </div>
            <a href="#" onclick="event.preventDefault(); document.getElementById('pay-form').submit();" class="btn btn-solid">Add Order</a>
        </div>
    </div>
    <!-- bottom panel end -->


@endsection
