@extends('front.layouts.app')

@section('content')


  <!-- header start -->
  <header>
    <div class="back-links">
      <a href="{{ route('home') }}">
        <i class="iconly-Arrow-Left icli"></i>
        <div class="content">
          <h2>Order Placed</h2>
        </div>
      </a>
    </div>
  </header>
  <!-- header end -->


  <!-- order success section start -->
  <section class="order-success-section px-15 ">
    <div class="mt-5">
      <img src="{{ asset('static/images/check-circle.gif') }}" class="img-fluid" alt="">
      <h1>Ordered successfully!</h1>
      <h2>Payment is successfully processed and your Order is on the way.</h2>
    </div>
  </section>
  <!-- order success section end -->

  <section class="my-15">
    <style>
      .outputInvoice {
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        text-align: center;
        color: #777;
      }

      .outputInvoice h1 {
        font-weight: 300;
        margin-bottom: 0px;
        padding-bottom: 0px;
        color: #000;
      }

      .outputInvoice h3 {
        font-weight: 300;
        margin-top: 10px;
        margin-bottom: 20px;
        font-style: italic;
        color: #555;
      }

      .outputInvoice a {
        color: #06f;
      }

      .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
      }

      .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
        border-collapse: collapse;
      }

      .invoice-box table td {
        padding: 5px;
        vertical-align: top;
      }

      .invoice-box table tr td:nth-child(2) {
        text-align: right;
      }

      .invoice-box table tr.top table td {
        padding-bottom: 20px;
      }

      .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
      }

      .invoice-box table tr.information table td {
        padding-bottom: 40px;
      }

      .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
      }

      .invoice-box table tr.details td {
        padding-bottom: 20px;
      }

      .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
      }

      .invoice-box table tr.item.last td {
        border-bottom: none;
      }

      .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
      }

      @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
          width: 100%;
          display: block;
          text-align: center;
        }

        .invoice-box table tr.information table td {
          width: 100%;
          display: block;
          text-align: center;
        }
      }
    </style>

  <div class="my-4 outputInvoice" id="outputInvoice">
    <div class="invoice-box">
      <table>
        <tr class="top">
          <td colspan="2">
            <table>
              <tr>
                <td class="title">
                  <img src="{{ asset('static/images/logo.png') }}" alt="Company logo" style="width: 100%; max-width: 200px" />
                </td>

                <td>
                  Invoice #: {{ $order->id }}<br />
                  Created: {{ date('d-m-Y', strtotime($order->created_at)) }} <br />
                  Date Delivered: @if($order->date_delivered) {{ date('d-m-Y', strtotime($order->date_delivered)) }} @endif
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <tr class="information">
          <td colspan="2">
            <table>
              <tr>
                <td>
                  Zimbo Delights Limited<br />
                  admin@zimbodelights.com<br />
                  www.zimbodelights.com
                </td>

                <td>
                  {{ $order->buyer_name }}<br />
                  {{ $order->buyer_email }}<br />
                  {{ $order->buyer_address }}
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <tr class="heading">
          <td>Payment Method</td>
          <td></td>
        </tr>

        <tr class="details">
          <td>{{ $order->payment_method }}</td>
          <td></td>
        </tr>

        <tr class="heading">
          <td>Item</td>

          <td>Price</td>
        </tr>

        @foreach($products as $product)
        <tr class="item">
          <td>{{ $product->product_name }} x{{ $product->quantity }}</td>
          <td>£@convert($product->price)</td>
        </tr>
        @endforeach
        <tr class="item last">
          <td></td>
          <td>Delivery: £@convert($order->delivery_fees)</td>
        </tr>
        <tr class="total">
          <td></td>
          <td>Total: £@convert($order->total)</td>
        </tr>
      </table>
    </div>
  </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <div class="card mt-4">
          <div class="text-center mt-4 mb-4">
              <button onclick="printOrder()" class="btn btn-outline-primary">Download PDF</button>
          </div>
          <script>
            function printOrder() {
              var element = document.getElementById('outputInvoice');
              html2pdf(element);
            }
          </script>
      </div>
  </section>

  <!-- panel space start -->
  <section class="panel-space"></section>
  <!-- panel space end -->


  <!-- bottom panel start -->
  <div class="delivery-cart cart-bottom">
    <div>
      <div class="left-content">
        <a href="{{ route('buyer.orders') }}" class="title-color">Track Order</a>
      </div>
      <a href="{{ route('home') }}" class="btn btn-solid">Continue shopping</a>
    </div>
  </div>
  <!-- bottom panel end -->


@endsection
