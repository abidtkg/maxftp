@extends('layouts.master')
@section('content')
<div class="container">
    <h4 class="mb-4">Requested media from website users</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Movie Name</th>
                <th scope="col">IMDB ID</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $request)
            <tr>
                <th scope="row">{{ $request->id }}</th>
                <th scope="row">{{ $request->email }}</th>
                <td>{{ $request->movie_name }}</td>
                <td>{{ $request->imdb_id }}</td>
                <td>
                    @if($request->done == true)
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    @endif
                    
                    @if($request->done == false)
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                    </svg>
                    @endif
                </td>
                <td>{{ date('d M Y', strtotime($request->created_at)) }}</td>
                <td>
                    @if($request->done == false)
                    <a class="btn btn-info" onclick="confirm('Are you sure?')" href="{{ route('admin.moviereq.approve', $request->id) }}">Mark As Done</a>
                    @endif
                    <a class="btn btn-danger" onclick="confirm('Are you sure?')" href="{{ route('admin.moviereq.delete', $request->id) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if ($requests->hasPages())
        <div class="card-footer clearfix">
            <div class="pagination-wrapper">
                {{ $requests->links('pagination::bootstrap-5') }}
            </div>
        </div>
    @endif
</div>
@endsection