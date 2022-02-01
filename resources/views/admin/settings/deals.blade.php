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
                                <h6 class="card-title d-flex justify-content-between mb-4">
                                  Deal Information
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
                                          <label for="name" class="form-label">Deal Name</label>
                                          <input type="text" class="form-control" id="name"
                                                 aria-describedby="emailHelp" name="name">
                                      </div>

                                      <div class="mb-3">
                                          <label for="duration" class="form-label">Deal Date End</label>
                                          <input type="text" class="form-control" id="duration" placeholder="Jan 01, 2021 00:00:00"
                                                 aria-describedby="emailHelp" name="duration">
                                      </div>

                                      <div class="mb-3">
                                          <label for="link" class="form-label">Deal Link</label>
                                          <input type="text" class="form-control" id="link"
                                                 aria-describedby="emailHelp" name="link">
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
                                          <label for="name" class="form-label">Deal Name</label>
                                          <input type="text" class="form-control" id="name" placeholder="{{ $deal->name }}"
                                                 aria-describedby="emailHelp" disabled>
                                      </div>

                                      <div class="mb-3">
                                          <label for="duration" class="form-label">Deal Date End</label>
                                          <input type="text" class="form-control" id="duration" placeholder="{{ $deal->duration }}"
                                                 aria-describedby="emailHelp" disabled>
                                      </div>

                                      <div class="mb-3">
                                          <label for="link" class="form-label">Deal Link</label>
                                          <input type="text" class="form-control" id="link"
                                                 aria-describedby="emailHelp" name="link" placeholder="{{ $deal->link }}">
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


                </div>

            </div>
        </div>

        @include('admin.settings.partials')
    </div>

    </div>
    <!-- ./ content -->

@endsection
