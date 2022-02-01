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
                                          <a href="{{ route('admin.settings.delete_banner', $banner->id) }}" class="btn-sm btn-danger">Delete</a>
                                      </td>
                                  </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>



                </div>

            </div>
        </div>

        @include('admin.settings.partials')
    </div>

    </div>
    <!-- ./ content -->

@endsection
