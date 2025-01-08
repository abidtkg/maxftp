@extends('layouts.master')
@section('content')
<div class="container">
    <a class="btn btn-info mb-3" href="{{ route('admin.movie.create') }}">ADD MOVIE</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Added</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
            <tr>
                <th scope="row">{{ $movie->id }}</th>
                <td>
                    <img src="{{ asset('uploads/' . $movie->image) }}" class="img-fluid" style="max-height: 70px;" alt="">
                </td>
                <td>{{ $movie->name }}</td>
                <td>{{ date('d M Y', strtotime($movie->created_at)) }}</td>
                <td>
                    <a class="btn btn-info" href="#">Edit</a>
                    <a class="btn btn-danger" onclick="confirm('Are you sure?')" href="{{ route('admin.movie.delete', $movie->id) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if ($movies->hasPages())
        <div class="card-footer clearfix">
            <div class="pagination-wrapper">
                {{ $movies->links('pagination::bootstrap-5') }}
            </div>
        </div>
    @endif
</div>
@endsection