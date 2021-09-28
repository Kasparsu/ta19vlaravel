@extends('layout')
@section('title', 'Posts')
@section('content')
    @foreach($posts as $post)
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->body }}</p>
                <a href="#" class="card-link">Read more</a>
            </div>
        </div>
    @endforeach
@endsection
