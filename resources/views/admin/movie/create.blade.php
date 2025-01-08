@extends('layouts.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Add Movie</h5>
        </div>
        <div class="card-body">
            <form class="row g-3" method="POST" action="{{ route('admin.movie.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name">
                </div>
                <div class="col-md-12">
                    <label for="link" class="form-label">Streaming File Link (mp4 file)</label>
                    <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" id="link">
                </div>
                <div class="col-md-6">
                    <label for="imdbid" class="form-label">IMDB ID</label>
                    <input type="text" name="imdbid" class="form-control @error('imdbid') is-invalid @enderror" id="imdbid">
                </div>
                <div class="col-md-6">
                    <label for="category_id" class="form-label">Category</label>
                    <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="quality" class="form-label @error('category_id') is-invalid @enderror">Category</label>
                    <select id="quality" name="quality" class="form-select">
                        <option value="SD">SD</option>
                        <option value="HD">HD</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="image" class="form-label">Thumbnail Image</label>
                    <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" accept="image/*">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection