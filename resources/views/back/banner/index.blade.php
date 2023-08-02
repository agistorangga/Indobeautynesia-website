@extends('layouts.back.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex justify-content-between align-items-center">
                                List Banner
                                <a class="btn btn-primary" href="{{ route('banner.create') }}">Create Banner</a>
                            </div>
                        </div>



                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>photo</th>
                                        <th>Description</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <img src="{{ asset('photobanner/'.$item->photo) }}" alt="">

                                            </td>
                                            <td>{{ $item->description }}</td>
                                            <td>

                                                <a href="{{ route('banner.edit', [$item->id]) }}"><i class="fa-solid fa-pen-to-square" style="color: #1aff5e; margin-right: 10px; font-size: 10px;">Edit</i></a>

                                                <a href="{{ route('banner.delete', [$item->id]) }}"><i class="fa-solid fa-trash" style="color: #ff0000; margin-right: 10px; font-size: 10px;">Delete</i></a>
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
