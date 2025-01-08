@extends('layouts.app')
@section('title', $movie->name)
@section('page-css')
<link href="https://vjs.zencdn.net/8.16.1/video-js.css" rel="stylesheet" />
@endsection
@section('content')
<div class="container">
    <video id="my-video" class="video-js" controls preload="auto" data-setup="{}" >
        <source src="{{ $movie->link }}" type="video/mp4" />
        <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a web browser that
            <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
        </p>
    </video>
    <div class="row mt-4">
        <div class="col-md-8 mb-4">
            <h2>{{ $movie->name }}</h2>
            <ul class="list-unstyled">
                <li><strong>Category:</strong> {{ $movie->category->name }}</li>
                <li><strong>Quality:</strong> {{ $movie->quality }}</li>
            </ul>
        </div>
        <!-- Stream and Download Buttons -->
        <div class="col-md-4 mb-4">
            <a href="{{ $movie->link }}" download="{{ $movie->name }}" class="btn btn-success w-100 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                </svg>
                <span class="ms-2">DOWNLOAD HD</span>
            </a>
        </div>
    </div>
</div>
@endsection

@section('page-js')
<script src="https://vjs.zencdn.net/8.16.1/video.min.js"></script>

<script>
    var player = videojs('my-video', {
        fluid: true,
        aspectRatio: '22:9'
    });
</script>
@endsection