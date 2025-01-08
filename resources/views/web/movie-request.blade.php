@extends('layouts.app')
@section('page-css')
<link href="https://vjs.zencdn.net/8.16.1/video-js.css" rel="stylesheet" />
@endsection
@section('content')
<div class="container">
    <form action="{{ route('web.requestmovie.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="mb-3">
            <label for="moviename" class="form-label">Movie Name</label>
            <input type="text" class="form-control" name="movie_name" id="moviename">
        </div>
        <div class="mb-3">
            <label for="imdb_id" class="form-label">IMDB ID (if any)</label>
            <input type="text" class="form-control" name="imdb_id" id="imdb_id">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
