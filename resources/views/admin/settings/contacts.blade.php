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
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">


                    <div class="card mb-4">
                        <div class="card-body">
                            <h6 class="card-title mb-4">Contact Details</h6>
                            @if(!$contact)
                            <form class="" action="{{ route('admin.settings.add_contact') }}" method="post">
                              @csrf
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="mb-3">
                                          <label class="form-label">Phone</label>
                                          <input type="text" class="form-control" name="phone">
                                      </div>
                                      <div class="mb-3">
                                          <label class="form-label">Email</label>
                                          <input type="text" class="form-control" name="email">
                                      </div>
                                      <div class="mb-3">
                                          <label class="form-label">City</label>
                                          <input type="text" class="form-control" name="city">
                                      </div>
                                      <div class="mb-3">
                                          <label class="form-label">Address Line 1</label>
                                          <input type="text" class="form-control" name="address_1">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="mb-3">
                                          <label class="form-label">Post Code</label>
                                          <input type="text" class="form-control" name="post_code">
                                      </div>
                                      <div class="mb-3">
                                          <label class="form-label">Address Line 2</label>
                                          <input type="text" class="form-control" name="address_2">
                                      </div>
                                      <div class="mb-3">
                                          <label class="form-label">Province</label>
                                          <input type="text" class="form-control" name="province">
                                      </div>
                                      <div class="mb-3">
                                          <label class="form-label">Country</label>
                                          <input type="text" class="form-control" name="country">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Google Maps Location</label>
                                        <input type="text" class="form-control" name="google_maps_url">
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit Details</button>
                                  </div>
                              </div>
                            </form>
                            @else
                            <form class="" action="{{ route('admin.settings.edit_contact', $contact->id) }}" method="post">
                              @csrf
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="mb-3">
                                          <label class="form-label">Phone</label>
                                          <input type="text" class="form-control" name="phone" value="{{ $contact->phone }}">
                                      </div>
                                      <div class="mb-3">
                                          <label class="form-label">Email</label>
                                          <input type="text" class="form-control" name="email" value="{{ $contact->email }}">
                                      </div>
                                      <div class="mb-3">
                                          <label class="form-label">City</label>
                                          <input type="text" class="form-control" name="city" value="{{ $contact->city }}">
                                      </div>
                                      <div class="mb-3">
                                          <label class="form-label">Address Line 1</label>
                                          <input type="text" class="form-control" name="address_1" value="{{ $contact->address_1 }}">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="mb-3">
                                          <label class="form-label">Post Code</label>
                                          <input type="text" class="form-control" name="post_code" value="{{ $contact->post_code }}">
                                      </div>
                                      <div class="mb-3">
                                          <label class="form-label">Address Line 2</label>
                                          <input type="text" class="form-control" name="address_2" value="{{ $contact->address_2 }}">
                                      </div>
                                      <div class="mb-3">
                                          <label class="form-label">Province</label>
                                          <input type="text" class="form-control" name="province" value="{{ $contact->province }}">
                                      </div>
                                      <div class="mb-3">
                                          <label class="form-label">Country</label>
                                          <input type="text" class="form-control" name="country" value="{{ $contact->country }}">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Google Maps Location</label>
                                        <input type="text" class="form-control" name="google_maps_url" value="{{ $contact->google_maps_url }}">
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit Details</button>
                                  </div>
                              </div>
                            </form>

                            @endif
                        </div>
                    </div>

                </div>
              
            </div>
        </div>

        @include('admin.settings.partials')
    </div>

    </div>
    <!-- ./ content -->

@endsection
