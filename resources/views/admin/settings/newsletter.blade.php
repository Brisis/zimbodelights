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
                    <a href="#">
                        <i class="bi bi-globe2 small me-2"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Newsletter Subscribers</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex gap-4 align-items-center">
                        <div class="d-none d-md-flex">All Newsletter Subscribers</div>
                        <div class="d-md-flex gap-4 align-items-center">
                            <form class="mb-3 mb-md-0">
                                <div class="row g-3">
                                  <div class="col-md-12">
                                      <div class="input-group">
                                          <input type="text" class="form-control" placeholder="Search">
                                          <button class="btn btn-outline-light" type="button">
                                              <i class="bi bi-search"></i>
                                          </button>
                                      </div>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-custom table-lg mb-0" id="products">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email Address</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($newsletters as $newsletter)
                    <tr>
                        <td>
                            <a href="">#{{ $newsletter->id }}</a>
                        </td>
                        <td>{{ $newsletter->email }}</td>
                        <td>
                          @if($newsletter->is_active)
                            <span class="text-success">Active</span>
                          @else
                            <span class="text-danger">Disabled</span>
                          @endif
                        </td>
                        <td>{{ date('d/m/Y', strtotime($newsletter->created_at)) }}</td>
                        <td class="text-end">
                            <a href="" class="">Action</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{ $newsletters->links('admin.partials.pagination') }}

        </div>

    </div>

    </div>
    <!-- ./ content -->

    @endsection
