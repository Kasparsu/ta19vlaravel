@extends('layout')
@section('title', 'New Post')
@section('content')
    <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
        @csrf
        @error('title')
            @foreach($errors->get('title') as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @enderror
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        @error('body')
            @foreach($errors->get('body') as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @enderror
        <div class="mb-3">
            <label for="body" class="form-label">Content</label>
            <textarea class="form-control" id="body" rows="15" name="body">{{ old('body') }}</textarea>
        </div>
        @error('image')
            @foreach($errors->get('image') as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @enderror
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image[]" accept="image/*" multiple>
        </div>
        <input type="submit" class="btn btn-primary" value="Create">
    </form>
@endsection
