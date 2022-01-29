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
                    <form action="{{ route('admin.products.add_product') }}" method="post">
                      @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Product name</label>
                            <input type="text" class="form-control" id="name"
                                   aria-describedby="emailHelp" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Category</label>
                            <select class="form-select" name="category">
                                <option selected>Select a category</option>
                                @foreach($categories as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>

                        <div class="mb-3">
                            <label for="discount" class="form-label">Discount % (optional)</label>
                            <input type="number" class="form-control" id="discount" name="discount">
                        </div>

                        <div class="mb-3">
                            <label for="qty" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="qty" name="stock">
                        </div>

                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight (g)</label>
                            <input type="number" class="form-control" id="weight" name="weight">
                        </div>

                        <!-- <div class="mb-3">
                            <label for="price" class="form-label">Description</label>
                            <textarea name="description" rows="3" class="form-control" name="description"></textarea>
                        </div> -->

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>

        </div>

    </div>

    </div>
    <!-- ./ content -->

  @endsection
