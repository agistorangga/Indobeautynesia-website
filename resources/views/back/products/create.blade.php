@extends('layouts.back.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Product</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name <span>*Required</span></label>
                                <input class="form-control" type="text" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category <span>*Required</span></label>
                                <select class="form-control select2-control" name="category_id" id="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="brand_id">Brand <span>*Required</span></label>
                                <select class="form-control select2-control" name="brand_id" id="brand_id">
                                    <option value="">Select Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="is_bundle" id="is_bundle">
                                        Bundling
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="price">Price <span>*Required</span></label>
                                <input class="form-control" type="text" name="price" id="price">
                            </div>
                            <div class="form-group">
                                <label for="package_weight">Package Weight</label>
                                <input class="form-control" type="text" name="package_weight" id="package_weight">
                            </div>
                            <div class="form-group">
                                <label for="photo">Upload Photo</label>
                                <input class="form-control" type="file" name="photo" id="photo">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="10" name="description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js-content')
    <script>
        $("#is_bundle").on('change', function() {
            if ($(this).is(':checked')) {
                $(this).attr('value', 'true');
            } else {
                $(this).attr('value', 'false');
            }
        });

        (function($) {
            'use strict';
            $('.select2-control').select2();

        })(jQuery);
    </script>
@endsection
