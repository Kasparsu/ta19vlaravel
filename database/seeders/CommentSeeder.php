<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        $faker = Factory::create();
        foreach ($posts as $post){
            Comment::factory(rand(0, 10))
                ->make([
                    'post_id' => $post->id,
                    'user_id' => User::inRandomOrder()->first()->id
                ])->each(function ($comment) use($post, $faker) {
                    $created = $faker->dateTimeBetween($post->created_at, 'now');
                    $updated = $faker->dateTimeBetween($created, 'now');
                    if(rand(0, 3)){
                        $updated = $created;
                    }
                    $comment->updated_at = $updated;
                    $comment->created_at = $created;
                    $comment->save();
                });
        }
    }
}
