@extends('layout')
@section('title', $post->title)
@section('content')
    <a class="btn btn-primary" href="{{url()->previous()}}">Back</a>
<div class="card mt-3">
    @if($post->image_path)
        <img src="{{$post->image_path}}" class="card-img-top">
    @endif
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{!! $post->displayBody !!}</p>
    </div>
</div>
@endsection
