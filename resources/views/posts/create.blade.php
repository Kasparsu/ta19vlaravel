@extends('layout')
@section('title', 'New Post')
@section('content')
    <form method="post" action="/admin/posts">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Content</label>
            <textarea class="form-control" id="body" rows="15" name="body"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Create">
    </form>
@endsection
