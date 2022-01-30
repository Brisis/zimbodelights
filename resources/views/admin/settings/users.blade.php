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
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-globe2 small me-2"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Amdin Setup</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-custom table-lg mb-0" id="products">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <a href="">#{{ $user->id }}</a>
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                          @if($user->is_admin)
                            <span class="badge badge-success bg-success">Is Admin</span>
                          @else
                            <span class="badge badge-warning bg-warning">Not Admin</span>
                          @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.settings.make_admin', $user) }}" class="btn-sm btn-primary">Change Status</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{ $users->links('admin.partials.pagination') }}

        </div>

    </div>

    </div>
    <!-- ./ content -->

    @endsection
