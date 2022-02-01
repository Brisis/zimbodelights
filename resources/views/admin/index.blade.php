@extends('admin.layouts.app')

@section('content')

@include('admin.partials.side-nav')

<!-- layout-wrapper -->
<div class="layout-wrapper">

    @include('admin.partials.header')

    <!-- content -->
    <div class="content ">

    <div class="row row-cols-1 row-cols-md-3 g-4">

        <div class="col-lg-6 col-md-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="display-7">
                            <i class="bi bi-basket"></i>
                        </div>
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-sm" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{ route('admin.orders.orders') }}" class="dropdown-item">View Detail</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="mb-3">Orders</h4>
                    <div class="d-flex mb-3">
                        <div class="display-7">{{ $orders }}</div>
                        <div class="ms-auto" id="total-orders"></div>
                    </div>
                    <!-- <div class="text-success">
                        Over last month 1.4% <i class="small bi bi-arrow-up"></i>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="display-7">
                            <i class="bi bi-credit-card-2-front"></i>
                        </div>
                    </div>
                    <h4 class="mb-3">Sales</h4>
                    <div class="d-flex mb-3">
                        <div class="display-7">£@convert($sales)</div>
                        <div class="ms-auto" id="total-sales"></div>
                    </div>
                    <!-- <div class="text-danger">
                        Over last month 2.4% <i class="small bi bi-arrow-down"></i>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12">
            <div class="card widget">
                <div class="card-header">
                    <h5 class="card-title">Activity Overview</h5>
                </div>
                <div class="row g-4">
                  <div class="col-md-4">
                      <div class="card border-0">
                          <div class="card-body text-center">
                              <div class="display-5">
                                  <i class="bi bi-receipt text-warning"></i>
                              </div>
                              <h5 class="my-3">Ordered</h5>
                              <div class="text-muted">{{ $orders }} New Orders</div>
                          </div>
                      </div>
                  </div>

                    <div class="col-md-4">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <div class="display-5">
                                    <i class="bi bi-cursor text-secondary"></i>
                                </div>
                                <h5 class="my-3">Processed</h5>
                                <div class="text-muted">{{ $shipped }} On the way</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <div class="display-5">
                                    <i class="bi bi-truck text-success"></i>
                                </div>
                                <h5 class="my-3">Delivered</h5>
                                <div class="text-muted">{{ $delivered }} Delivered Orders</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>
    <!-- ./ content -->


@endsection
