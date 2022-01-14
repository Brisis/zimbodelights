@extends('front.layouts.app')

@section('content')


  <!-- header start -->
  <header class="bg-transparent">
    <div class="back-links">
      <a href="{{ route('buyer.orders') }}">
        <i class="iconly-Arrow-Left icli"></i>
        <div class="content">
          <h2>Order Details</h2>
        </div>
      </a>
    </div>
  </header>
  <!-- header end -->


  <!-- product detail start -->
  <div class="map-product-section px-15">
    <div class="product-inline">
      <a href="">
        <img src="{{ asset('static/images/truck.gif') }}" class="img-fluid" alt="">
      </a>
      <div class="product-inline-content">
        <div>
          <a href="#!">
            <h4>@foreach($order->items as $product) {{ $product->product->name }},  @endforeach</h4>
          </a>

          <div class="price">
            <h4>$@convert($order->total)</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- product detail end -->


  <!-- order tracking start -->
  <div class="order-track px-15">
    <div class="order-track-step">
      <div class="order-track-status">
        <span class="order-track-status-dot">
          <img src="assets/svg/check.svg" class="img-fluid" alt="">
        </span>
        <span class="order-track-status-line"></span>
      </div>
      <div class="order-track-text">
        <p class="order-track-text-stat">Order Processing</p>
        <span class="order-track-text-sub">order received, being processed</span>
      </div>
    </div>
    @if($order->status == 'shipped' || $order->status == 'delivered') <div class="order-track-step"> @else <div class="order-track-step in-process"> @endif
      <div class="order-track-status">
        <span class="order-track-status-dot">
          <img src="assets/svg/check.svg" class="img-fluid" alt="">
        </span>
        <span class="order-track-status-line"></span>
      </div>
      <div class="order-track-text">
        <p class="order-track-text-stat"> In Transit</p>
        <span class="order-track-text-sub">order on the way</span>
      </div>
    </div>
    @if($order->status == 'delivered') <div class="order-track-step"> @else <div class="order-track-step in-process"> @endif
      <div class="order-track-status">
        <span class="order-track-status-dot">
          <img src="assets/svg/check.svg" class="img-fluid" alt="">
        </span>
        <span class="order-track-status-line"></span>
      </div>
      <div class="order-track-text">
        <p class="order-track-text-stat"> Delivered</p>
        <span class="order-track-text-sub">20/05/2020</span>
      </div>
    </div>
  </div>
  <div class="divider"></div>
  <!-- order tracking end -->

  <!-- address section start -->
  <div class="px-15">
    <h6 class="tracking-title content-color">Shipping Details</h6>
    <h4 class="fw-bold mb-1">{{ $order->buyer_name }}</h4>
    <h4 class="content-color">{{ $order->email }}</h4>
    <h4 class="content-color">{{ $order->buyer_address }}</h4>
    <h4 class="fw-bold mt-1">Order No: #{{ $order->id }}4</h4>
  </div>
  <div class="divider"></div>
  <!-- address section end -->


  <!-- order details section start -->
  <div class="px-15 section-b-space">
    <div class="order-details">
      <button onclick="generatePDF()" class="btn btn-outline content-color w-100 mt-4">Download Invoice</button>
    </div>
  </div>
  <!-- order details section end -->

  <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script> -->
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <div class="container">
    <div class="row">
        <div class="col-xs-12">
        <div class="invoice-title">
          <h2>Invoice</h2><h3 class="pull-right">Order No: fgh123-j</h3>
        </div>
        <hr>
        <div class="row">
          <div class="col-xs-6">
            <address>
            <strong>Billed To:</strong><br>
              Precious Pharmacy<br>
              24H Surburb<br>
              Foks-way<br>
              Ogun-State, P.M.b 2343
            </address>
          </div>
          <div class="col-xs-6 text-right">
            <address>
              <strong>Shipped To:</strong><br>
              Precious Pharmacy<br>
              24H Surburb<br>
              Foks-way<br>
              Ogun-State, P.M.b 2343
            </address>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6">
            <address>
              <strong>Payment Method:</strong><br>
              Mastercard ending **** 6464<br>
              abayomiogunnusi@email.com
            </address>
          </div>
          <div class="col-xs-6 text-right">
            <address>
              <strong>Order Date:</strong><br>
              July,11 2021<br><br>
            </address>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><strong>Purchase Summary</strong></h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-condensed">
                <thead>
                                <tr>
                      <td><strong>Drug Name</strong></td>
                      <td class="text-center"><strong>Amount</strong></td>
                      <td class="text-center"><strong>Quantity</strong></td>
                      <td class="text-right"><strong>Total</strong></td>
                                </tr>
                </thead>
                <tbody>
                  <!-- foreach ($order->lineItems as $line) or some such thing here -->
                  <tr>
                    <td>Paracetamol</td>
                    <td class="text-center">₦1000.00</td>
                    <td class="text-center">1</td>
                    <td class="text-right">₦1000</td>
                  </tr>
                                <tr>
                      <td>Blood Tonic</td>
                    <td class="text-center">₦300.00</td>
                    <td class="text-center">2</td>
                    <td class="text-right">₦600.00</td>
                  </tr>
                                <tr>
                        <td>Chloroquine</td>
                    <td class="text-center">₦700.00</td>
                    <td class="text-center">2</td>
                    <td class="text-right">₦1400.00</td>
                  </tr>
                  <tr>
                    <td class="thick-line"></td>
                    <td class="thick-line"></td>
                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                    <td class="thick-line text-right">₦3000.00</td>
                  </tr>
                  <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>Shipping</strong></td>
                    <td class="no-line text-right">₦300</td>
                  </tr>

                  <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>Clearing</strong></td>
                    <td class="no-line text-right">₦100</td>
                  </tr>
                  <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>Total</strong></td>
                    <td class="no-line text-right">₦3400</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


  <script>
    function generatePDF() {
        const element = document.getElementById('invoice');
        html2pdf()
            .from(element)
            .save();

    }
</script>


  @endsection
