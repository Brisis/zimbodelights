@extends('admin.layouts.app')

@section('content')

<!-- sidebars -->
@include('admin.partials.side-nav')
<!-- ./ sidebars -->

<!-- layout-wrapper -->
<div class="layout-wrapper">

    <!-- header -->
    @include('admin.partials.header')
    <!-- ./ header -->

    <!-- content -->
    <div class="content ">

    <div class="mb-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.orders.orders') }}">
                        <i class="bi bi-globe2 small me-2"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-8 col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-5 d-flex align-items-center justify-content-between">
                        <span>Order No : <a href="#">#{{ $order->id }}</a></span>
                        @if($order->is_paid)
                          <span class="badge bg-success">Paid</span>
                          @else
                          <span class="badge bg-danger">un-Paid</span>
                        @endif
                    </div>
                    <div class="row mb-5">
                      <form class="col-lg-12" action="{{ route('admin.orders.edit_order', $order->id) }}" method="post">
                        @csrf
                          <label for="price" class="form-label">Order Status: (current - <b>{{ $order->status }}</b> )</label>
                          <select class="form-select" name="status" required>
                              <option selected>Select status</option>
                              <option value="pending">Pending</option>
                              <option value="shipped">Shipped</option>
                              <option value="delivered">Delivered</option>
                          </select>
                        <div class="mt-3">
                          <button type="submit" class="btn btn-primary" name="button">Save</button>
                        </div>
                      </form>
                    </div>

                    <div class="row mb-5 g-4">
                        <div class="col-md-12 col-sm-12">
                            <p class="fw-bold">Order Created at</p>
                            {{ date('d/m/Y', strtotime($order->created_at)) }}
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body d-flex flex-column gap-3">
                                    <div class="">
                                        <h5 class="mb-0">Buyer Details</h5>
                                    </div>
                                    <div>Name: {{ $order->buyer_name }}</div>
                                    <div>Address: {{ $order->buyer_address }}</div>
                                    <div>
                                        Email: {{ $order->buyer_email }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body d-flex flex-column gap-3">
                                    <div class="">
                                        <h5 class="mb-0">Billing Details</h5>
                                    </div>
                                    <div>Card Holder Name: {{ $order->card_name }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h6 class="card-title mb-4">Order Cost</h6>
                    <div class="row justify-content-center mb-3">
                        <div class="col-4 text-end">Shipping :</div>
                        <div class="col-4">$10.00</div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-4 text-end">
                            <strong>Total :</strong>
                        </div>
                        <div class="col-4">
                            <strong>$@convert($order->total)</strong>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card widget">
                <h5 class="card-header">Order Items</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-custom mb-0">
                            <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>
                                    <a target="_blank" href="{{ route('product', $product->product->slug) }}">
                                        <img src="{{ asset($product->product->image) }}" class="rounded" width="60" alt="...">
                                    </a>
                                </td>
                                <td>{{ $product->product->name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>$@convert($product->product->price)</td>
                                <td>$@convert($product->price)</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

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
        									Created: {{ date('d-m-Y', strtotime($order->created_at)) }}<br />
        									Paid: {{ date('d-m-Y', strtotime($order->created_at)) }}
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
        									ZimboDelights, Inc.<br />
        									12345 Sunny Road<br />
        									London
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
        					<td>{{ $product->product->name }} x{{ $product->quantity }}</td>
        					<td>$@convert($product->price)</td>
        				</tr>
                @endforeach
                <tr class="item last">
                  <td></td>
                  <td>Delivery: $10.0</td>
                </tr>
        				<tr class="total">
        					<td></td>
        					<td>Total: $@convert($order->total)</td>
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
            </div>
    </div>

    </div>
    <!-- ./ content -->

    @endsection
