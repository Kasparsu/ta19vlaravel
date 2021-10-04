@extends('layout')
@section('title', 'Posts')
@section('content')
    <div class="row row-cols-4">
        @foreach($posts as $post)
            <div class="col">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->snippet }}</p>
                        <a href="{{route('post', ['post' => $post->id])}}" class="card-link">Read more</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
