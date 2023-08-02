<!-- resources/views/promos/show.blade.php -->
@extends('layouts.back.master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Promo Detail</h4>

                        <p><strong>Name :</strong> {{ $promo->name }}</p>
                        <p><strong>Description :</strong> {{ $promo->description }}</p>
                        <p><strong>Start Date :</strong> {{ $promo->start_date }}</p>
                        <p><strong>End Date :</strong> {{ $promo->end_date }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
