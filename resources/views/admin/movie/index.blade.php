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
            <tr>
                <th scope="row">1</th>
                <td>
                    <img src="" alt="">
                </td>
                <td>Movie name</td>
                <td>10 hours ago</td>
                <td>
                    <a class="btn btn-info" href="#">Edit</a>
                    <a class="btn btn-danger" href="#">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection