@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Total Movies</h4>
                </div>
                <div class="card-body">
                    <h1>{{ $total_movies }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection