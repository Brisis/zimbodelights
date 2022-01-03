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

                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title mb-4">Social Platforms</h6>
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

            </div>
        </div>

        @include('admin.settings.partials')
    </div>

    </div>
    <!-- ./ content -->

@endsection
