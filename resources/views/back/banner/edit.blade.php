@extends('layouts.back.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Banner</h4>

                        <form action="{{ route('banner.update', [$product->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" id="name" value="{{ $product->name }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Photo</label>
                                <div class="d-flex">
                                    <img class="img-fluid" style="max-width: 200px;" src="{{ asset('photobanner/'.$product->photo) }}" alt="">
                                </div>
                                <input class="form-control" type="file" name="photo" id="photo" value="{{ $product->photo }}">

                            </div>
                            <div class="form-group">
                                <label for="name">Description</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="10" name="description">{{ $product->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
