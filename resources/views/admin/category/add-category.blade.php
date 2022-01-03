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

    <div class="row">
        <div class="order-2 order-lg-1 col-lg-9 bd-content">

            <h4>Fill Form</h4>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.categories.add_category') }}" method="post" enctype="multipart/form-data">
                      @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Category name</label>
                            <input type="text" class="form-control" id="name"
                                   aria-describedby="emailHelp" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Category image</label>
                            <input type="file" class="form-control" id="file" name="image_path" accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>

        </div>

    </div>

    </div>
    <!-- ./ content -->

  @endsection
