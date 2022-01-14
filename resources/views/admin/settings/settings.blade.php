@extends('admin.layouts.app')

@section('content')

@include('admin.partials.side-nav')

<!-- layout-wrapper -->
<div class="layout-wrapper">

    @include('admin.partials.header')

    <!-- content -->
    <div class="content ">

    <div class="row flex-column-reverse flex-md-row">
      <div class="col-md-8">
          <div class="card sticky-top mb-4 mb-md-0">
              <div class="card-body">
                  <ul class="nav nav-pills flex-column gap-2">
                      <li class="nav-item" role="presentation">
                          <a class="nav-link" href="{{ route('admin.settings.add_banner') }}">
                              <i class="bi bi-globe me-2"></i> Website Banner
                          </a>
                      </li>
                      <li class="nav-item" role="presentation">
                          <a class="nav-link" href="{{ route('admin.settings.add_deals') }}">
                              <i class="bi bi-clock me-2"></i> Deals Countdown
                          </a>
                      </li>
                      <li class="nav-item" role="presentation">
                          <a class="nav-link" href="{{ route('admin.settings.add_contact') }}">
                              <i class="bi bi-phone me-2"></i> Contact Details
                          </a>
                      </li>
                      <li class="nav-item" role="presentation">
                          <a class="nav-link" href="{{ route('admin.settings.add_socials') }}">
                              <i class="bi bi-facebook me-2"></i> Company Socials
                          </a>
                      </li>
                      <li class="nav-item" role="presentation">
                          <a class="nav-link" href="{{ route('admin.settings.newsletter') }}">
                              <i class="bi bi-envelope me-2"></i> Newsletter
                          </a>
                      </li>
                      <li class="nav-item" role="presentation">
                          <a class="nav-link" href="{{ route('admin.settings.settings') }}">
                              <i class="bi bi-lock me-2"></i> Credentials
                          </a>
                      </li>
                      <li class="nav-item" role="presentation">
                          <a class="nav-link" href="{{ route('admin.settings.settings') }}">
                              <i class="bi bi-bell me-2"></i> Notifications
                          </a>
                      </li>
                      <li class="nav-item" role="presentation">
                          <a class="nav-link" href="{{ route('admin.settings.settings') }}">
                              <i class="bi bi-arrow-down-up me-2"></i> Integrations
                          </a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>

    </div>

    </div>
    <!-- ./ content -->

@endsection
