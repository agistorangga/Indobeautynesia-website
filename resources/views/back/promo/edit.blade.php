@extends('layouts.back.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Promo</h4>

                        <form action="{{ route('promo.update', [$promo->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ $promo->name }}">
                            </div>
                            <div class="form-group">
                                <label for="discount">Discount (in %)</label>
                                <input class="form-control" type="number" name="discount" id="discount"
                                    value="{{ $promo->discount }}">
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <div class="d-flex">
                                    <img src="{{ asset('photopromo/' . $promo->photo ) }}" class="img-fluid" style="width: 200px" alt="">
                                </div>
                                <input class="form-control" type="file" name="photo" id="photo" value="{{ $promo->photo }}">
                            </div>
                            <div class="form-group">
                                <label for="products">Product</label>
                                <select class="form-control select2-control" name="products[]" id="products" multiple>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Description</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="10" name="description">{{ $promo->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="is_active" id="is_active"
                                            {{ $promo->is_active ? 'checked' : '' }}>
                                        Active Promo
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Promo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js-content')
    <script>
        $("#is_active").on('change', function() {
            if ($(this).is(':checked')) {
                $(this).attr('value', 'true');
            } else {
                $(this).attr('value', 'false');
            }
        });

        (function($) {
            'use strict';
            $('.select2-control').select2();
            $('.select2-control').val({{ $promo->products->pluck('id') }}).trigger("change");

        })(jQuery);
    </script>
@endsection
