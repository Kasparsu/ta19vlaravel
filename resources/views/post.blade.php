@extends('layout')
@section('title', $post->title)
@section('content')
<div class="card mt-3">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{!! $post->body !!}</p>
    </div>
</div>
@endsection
