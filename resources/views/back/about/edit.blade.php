@extends('layouts.back.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit About Us</h4>

                        <form action="{{ route('about.update',[$data->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Key</label>
                                <input class="form-control" id="" name="key" value="{{$data->key}}"></input>
                            </div>
                            <div class="form-group">
                                <label for="name">Value</label>
                                <textarea class="form-control" name="value" id="" cols="30" rows="10">{{$data->value}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
