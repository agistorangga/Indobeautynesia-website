@extends('layouts.back.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Product</h4>

                        <form action="{{ route('products.update', [$product->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ $product->name }}">
                            </div>
                            <div class="form-group">
                                <label for="subtitle">Subtitle</label>
                                <input class="form-control" type="text" name="subtitle" id="subtitle"
                                    value="{{ $product->subtitle }}">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control select2-control" name="category_id" id="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option {{ $product->category_id == $category->id ? 'selected' : '' }}
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Brand</label>
                                <select class="form-control select2-control" name="brand_id" id="brand_id">
                                    <option value="">Select Brand</option>
                                    @foreach ($brands as $brand)
                                        <option {{ $product->brand_id == $brand->id ? 'selected' : '' }}
                                            value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="is_bundle" id="is_bundle"
                                            {{ $product->is_bundle ? 'checked' : '' }}>
                                        Bundling
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input class="form-control" type="text" name="price" id="name"
                                    value="{{ $product->price }}">
                            </div>
                            <div class="form-group">
                                <label for="size">Size</label>
                                <input class="form-control" type="text" name="size" id="size"
                                    value="{{ $product->size }}">
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <div class="d-flex">
                                    <img class="img-fluid" style="max-width: 200px;"
                                        src="{{ asset('photoproduct/' . $product->photo) }}" alt="">
                                </div>
                                <input class="form-control" type="file" name="photo" id="photo"
                                    value="{{ $product->photo }}">

                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="10" name="description">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="how_to_use">How to Use</label>
                                <textarea class="form-control" name="how_to_use" id="" cols="30" rows="10" name="how_to_use">{{ $product->how_to_use }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="ingredients">Ingredients</label>
                                <textarea class="form-control" name="ingredients" id="" cols="30" rows="10" name="ingredients">{{ $product->ingredients }}</textarea>
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
