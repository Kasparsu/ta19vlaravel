<?php

namespace App\Http\Controllers;

use App\Http\Middleware\UserOwnsPost;
use App\Http\Requests\CreatePostRequest;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware(UserOwnsPost::class)->except(['index', 'create', 'store', 'posts']);
    }

    public function posts(){
        return Post::with(['images'])->inRandomOrder()->take(20)->get();
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->posts()->paginate();
        return response()->view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePostRequest $request)
    {
        $post = new Post($request->validated());
        $post->user_id = Auth::user()->id;
//        $post->title = $request->input('title');
//        $post->body = $request->input('body');
        $post->save();
        foreach ($request->validated()['image'] as $image) {
            $path = $image->store('public');
            $image = new Image();
            $image->path = Storage::url($path);
            $post->images()->save($image);
        }
        return response()->redirectTo('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$post = Post::findOrFail($id);
        return response()->view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return response()->view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CreatePostRequest $request, Post $post)
    {
//        $post->title = $request->input('title');
//        $post->body = $request->input('body');
        $post->fill($request->validated());
        $post->save();
        return response()->redirectTo('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->redirectTo('/admin/posts');
    }
}
