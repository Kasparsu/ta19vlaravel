@extends('layout')
@section('title', 'Posts')
@section('content')
    <a class="btn btn-primary" href="{{route('posts.create')}}">New Post</a>
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
                    <td>{{$post->created_at->setTimezone('Europe/Tallinn')}}</td>
                    <td>{{$post->updated_at->setTimezone('Europe/Tallinn')}}</td>
                    <td>
                        <form method="POST" action="{{route('posts.destroy', ['post'=> $post->id])}}">
                            @method('DELETE')
                            @csrf
                            <a class="btn btn-primary" href="">view</a>
                            <a class="btn btn-warning" href="{{route('posts.edit', ['post'=>$post->id])}}">edit</a>
                            <input class="btn btn-danger" type="submit" value="delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$posts->links()}}
@endsection
