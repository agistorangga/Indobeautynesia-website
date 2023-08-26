@extends('layouts.back.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Promo</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('promo.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name <span>*Required</span></label>
                                <input class="form-control" type="text" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="discount">Discount (in %) <span>*Required</span></label>
                                <input class="form-control" type="number" name="discount" id="discount">
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input class="form-control" type="file" name="photo" id="photo">
                            </div>
                            <div class="form-group">
                                <label for="products">Product <span>*Required</span></label>
                                <select class="form-control select2-control" name="products[]" id="products" multiple>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Description</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="10" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="is_active" id="is_active">
                                        Active Promo
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Promo</button>
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

        })(jQuery);
    </script>
@endsection
