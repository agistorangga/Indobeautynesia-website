@extends('layouts.back.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex justify-content-between align-items-center">
                                List Promo
                                <a class="btn btn-primary" href="{{ route('promo.create') }}">Create Promo</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Discount (in %)</th>
                                        <th>Photo</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($promos as $key => $promo)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $promo->name }}</td>
                                            <td>{{ $promo->discount }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <img src="{{ asset('photopromo/' . $promo->photo )}}" style="width: 100px; border-radius: 0!important" class="img-fluid" alt="">
                                                </div>
                                            </td>
                                            <td>
                                                @if ($promo->is_active)
                                                    <button class="btn btn-success" type="button">Active</button>
                                                @else
                                                <button class="btn btn-danger" type="button">Inactive</button>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('promo.edit', [$promo->id]) }}"><i
                                                        class="fa-solid fa-pen-to-square"
                                                        style="color: #1aff5e; margin-right: 10px; font-size: 10px;">Edit</i></a>

                                                <a href="{{ route('promo.delete', [$promo->id]) }}"><i
                                                        class="fa-solid fa-trash"
                                                        style="color: #ff0000; margin-right: 10px; font-size: 10px;">Delete</i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
