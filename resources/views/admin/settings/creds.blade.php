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
                    <div class="mb-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h6 class="card-title mb-4">Add Banner Slide</h6>
                                <div class="row mb-3">
                                  <form action="{{ route('admin.settings.add_banner') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                      <div class="mb-3">
                                          <label for="title" class="form-label">Banner Title</label>
                                          <input type="text" class="form-control" id="title"
                                                 aria-describedby="emailHelp" name="title">
                                      </div>

                                      <div class="mb-3">
                                          <label for="subtitle" class="form-label">Subtitle</label>
                                          <input type="text" class="form-control" id="subtitle"
                                                 aria-describedby="emailHelp" name="subtitle">
                                      </div>

                                      <div class="mb-3">
                                          <label for="url_link" class="form-label">Url Link</label>
                                          <input type="text" class="form-control" id="url_link"
                                                 aria-describedby="emailHelp" name="url_link">
                                      </div>

                                      <div class="mb-3">
                                          <label for="image" class="form-label">Banner Image</label>
                                          <input type="file" class="form-control" id="file" name="image_path" accept="image/*">
                                      </div>

                                      <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>
                                </div>

                                </div>
                            </div>
                        </div>

                        <div class="card mb-2">
                          <div class="card-body">
                            <h6 class="card-title">Banner Slides</h6>
                          </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-custom table-lg mb-0" id="orders">
                                <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Title</th>
                                    <!-- <th>Subtitle</th> -->
                                    <th>Url Link</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($banners as $banner)
                                  <tr>
                                      <td>
                                          <a href="#">
                                            <img src="{{ asset($banner->image) }}" class="rounded" width="40"
                                                 alt="Banner Photo">
                                          </a>
                                      </td>
                                      <td>{{ $banner->title }}</td>
                                      <!-- <td>{{ $banner->subtitle }}</td> -->
                                      <td>{{ $banner->url_link }}</td>
                                      <td class="text-end">
                                          <a href="{{ route('admin.settings.delete_banner', $banner->id) }}" class="">Delete</a>
                                      </td>
                                  </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    <div class="mb-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h6 class="card-title d-flex justify-content-between mb-4">
                                  Deals Information
                                  @if($deal)
                                    <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="m-3"><i class="bi bi-trash me-0"></i> Delete</a>
                                    <form id="delete-form" action="{{ route('admin.settings.delete_deals', $deal->id) }}" method="POST" hidden>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                  @endif
                                </h6>
                                @if(!$deal)
                                <div class="row mb-3">
                                  <form action="{{ route('admin.settings.add_deals') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                      <div class="mb-3">
                                          <label for="name" class="form-label">Deals Name</label>
                                          <input type="text" class="form-control" id="name"
                                                 aria-describedby="emailHelp" name="name">
                                      </div>

                                      <div class="mb-3">
                                          <label for="duration" class="form-label">Deals Date End</label>
                                          <input type="text" class="form-control" id="duration" placeholder="Jan 01, 2021 00:00:00"
                                                 aria-describedby="emailHelp" name="duration">
                                      </div>

                                      <div class="mb-3">
                                          <label for="image" class="form-label">Image</label>
                                          <input type="file" class="form-control" id="file" name="image_path" accept="image/*">
                                      </div>

                                      <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>
                                </div>
                                @else
                                <div class="row">
                                  <form action="{{ route('admin.settings.add_deals') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                      <div class="mb-3">
                                          <label for="name" class="form-label">Deals Name</label>
                                          <input type="text" class="form-control" id="name" placeholder="{{ $deal->name }}"
                                                 aria-describedby="emailHelp" disabled>
                                      </div>

                                      <div class="mb-3">
                                          <label for="duration" class="form-label">Deals Date End</label>
                                          <input type="text" class="form-control" id="duration" placeholder="{{ $deal->duration }}"
                                                 aria-describedby="emailHelp" disabled>
                                      </div>

                                      <div class="mb-3">
                                          <label for="image" class="form-label">Image</label>
                                          <img src="{{ asset($deal->image) }}" class="rounded" width="120"
                                               alt="Deals Photo">
                                        </div>
                                  </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

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
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title mb-4">Social</h6>
                            @if(!$social)
                            <form action="{{ route('admin.settings.add_socials') }}" method="post">
                              @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Twitter</label>
                                            <input type="text" class="form-control" name="twitter">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Facebook</label>
                                            <input type="text" class="form-control" name="facebook">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Instagram</label>
                                            <input type="text" class="form-control" name="instagram">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">WhatsApp</label>
                                            <input type="text" class="form-control" name="whatsapp">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                      <button type="submit" class="btn btn-primary">Submit Details</button>
                                    </div>
                                </div>
                            </form>
                            @else
                            <form action="{{ route('admin.settings.edit_socials', $social->id) }}" method="post">
                              @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Twitter</label>
                                            <input type="text" class="form-control" name="twitter"
                                                   value="{{ $social->twitter }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Facebook</label>
                                            <input type="text" class="form-control" name="facebook"
                                                   value="{{ $social->facebook }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Instagram</label>
                                            <input type="text" class="form-control" name="instagram"
                                                   value="{{ $social->instagram }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">WhatsApp</label>
                                            <input type="text" class="form-control" name="whatsapp"
                                                   value="{{ $social->whatsapp }}">
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
                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title mb-4">Change Password</h6>
                            <div class="mb-3">
                                <label class="form-label">Old Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">New Password Repeat</label>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="notification-settings" role="tabpanel"
                     aria-labelledby="notification-settings-tab">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title mb-4">Notifications</h6>
                            <h6 class="mb-4">Activity Notifications</h6>
                            <div class="mb-5">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" checked id="cs1">
                                        <label class="form-check-label" for="cs1">Someone assigns me to a task</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" checked id="cs2">
                                        <label class="form-check-label" for="cs2">Someone mentions me in a
                                            conversation</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" checked id="cs3">
                                        <label class="form-check-label" for="cs3">Someone adds me to a project</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="cs4">
                                        <label class="form-check-label" for="cs4">Activity on a project I am a member
                                            of</label>
                                    </div>
                                </div>
                            </div>
                            <h6 class="mb-4">Service Notifications</h6>
                            <div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="cs5">
                                        <label class="form-check-label" for="cs5">Monthly newsletter</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" checked id="cs6">
                                        <label class="form-check-label" for="cs6">Major feature enhancements</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="cs7">
                                        <label class="form-check-label" for="cs7">Minor updates and bug fixes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="integrations" role="tabpanel" aria-labelledby="integrations-tab">
                    <div class="card widget">
                        <div class="card-header">
                            <h6 class="card-title">Integrations</h6>
                        </div>
                        <div class="card-body p-0 overflow-hidden">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item p-4">
                                    <div class="d-md-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <figure class="mb-0 me-3">
                                                <img src="assets/svg/logo-integration-slack.svg"
                                                     alt="...">
                                            </figure>
                                            <div>
                                                <h5 class="mb-1">Slack</h5>
                                                <small class="text-muted">Permissions: Read, Write, Comment</small>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-danger mt-3 mt-md-0">Disconnect</button>
                                    </div>
                                </div>
                                <div class="list-group-item p-4">
                                    <div class="d-md-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <figure class="mb-0 me-3">
                                                <img src="assets/svg/logo-integration-drive.svg"
                                                     alt="...">
                                            </figure>
                                            <div>
                                                <h5 class="mb-1">Google Drive</h5>
                                                <small class="text-muted">Permissions: Read, Write</small>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-success mt-3 mt-md-0">Connect</button>
                                    </div>
                                </div>
                                <div class="list-group-item p-4">
                                    <div class="d-md-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <figure class="mb-0 me-3">
                                                <img src="assets/svg/logo-integration-dropbox.svg"
                                                     alt="...">
                                            </figure>
                                            <div>
                                                <h5 class="mb-1">Dropbox</h5>
                                                <small class="text-muted">Permissions: Read, Write, Upload</small>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-danger mt-3 mt-md-0">Disconnect</button>
                                    </div>
                                </div>
                            </div>
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
