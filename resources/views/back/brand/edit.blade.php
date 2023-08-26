@extends('layouts.back.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Brand</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('brand.update', [$data->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name <span>*Required</span></label>
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ $data->name }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Image <span>*Required</span></label>
                                <div class="d-flex">
                                    <img class="img-fluid" style="max-width: 200px;" src="{{ asset($data->image) }}"
                                        alt="">
                                </div>
                                <input class="form-control" type="file" name="image" id="image">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
