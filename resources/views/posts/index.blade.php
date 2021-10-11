@extends('layout')
@section('title', 'Posts')
@section('content')
    <a class="btn btn-primary" href="/admin/posts/create">New Post</a>
    {{$posts->links()}}
    <table class="table table-striped">
        <thead>
            <th>Id</th>
            <th>Title</th>
            <th>Create At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                    <td>
                        <a class="btn btn-primary" href="">view</a>
                        <a class="btn btn-warning" href="">edit</a>
                        <a class="btn btn-danger" href="">delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$posts->links()}}
@endsection
