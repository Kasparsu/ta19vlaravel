<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach($users as $user){
            Post::factory(rand(0, 50))->create(['user_id'=> $user->id]);
        }

        //Post::factory(1000)->create();
    }
}
