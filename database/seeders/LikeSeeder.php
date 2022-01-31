<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        foreach ($posts as $post){
            $rand = rand(0,20);
            $users = User::inRandomOrder()->take($rand)->get();
            Like::factory($rand)->make(['likable_id' => $post->id])->each(function ($like, $key) use ($users){
                $like->user_id = $users[$key]->id;
                $like->likable_type = Post::class;
                $like->save();
            });

            foreach ($post->comments as $comment){
                $rand = rand(0,20);
                $users = User::inRandomOrder()->take($rand)->get();
                Like::factory($rand)->make(['likable_id' => $comment->id])->each(function ($like, $key) use ($users){
                    $like->user_id = $users[$key]->id;
                    $like->likable_type = Comment::class;
                    $like->save();
                });
            }
        }
    }
}
