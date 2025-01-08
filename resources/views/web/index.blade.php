@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($movies as $movie)
        <div class="col-md-2">
            <a href="{{ route('web.movie', $movie->id) }}" style="text-decoration: none;">
            <div class="card shadow-sm">
                <img src="{{ asset('uploads/' . $movie->image) }}" style="wdith: 100%;" alt="">
                <div class="card-body">
                    <p class="card-text">{{ $movie->name }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        </div>
                        <small class="text-body-secondary">9 mins</small>
                    </div>
                </div>
            </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection