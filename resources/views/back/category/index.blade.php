@extends('layouts.back.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex justify-content-between align-items-center">
                                List Category
                                <a class="btn btn-primary" href="{{ route('category.create') }}">Create Category</a>
                            </div>
                        </div>



                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>

                                            <td>
                                            <a href="{{ route('category.edit', [$item->id]) }}"><i class="fa-solid fa-pen-to-square" style="color: #1aff5e; margin-right: 10px; font-size: 10px;">Edit</i></a>

                                            <a href="{{ route('category.delete', [$item->id]) }}"><i class="fa-solid fa-trash" style="color: #ff0000; margin-right: 10px; font-size: 10px;">Delete</i></a>
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