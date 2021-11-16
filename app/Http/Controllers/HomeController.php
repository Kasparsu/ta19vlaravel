<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function posts()
    {
        $posts = Post::latest()->paginate(16);

        return response()->view('posts', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function post(Post $post)
    {
        //$post = Post::findOrFail($id);
        return response()->view('post', compact('post'));
    }

    public function tag(Tag $tag){
        $posts = $tag->posts()->paginate();
        return response()->view('posts', compact('posts'));
    }
}
