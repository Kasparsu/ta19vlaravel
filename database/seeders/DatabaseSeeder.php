<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = env('DEFAULT_USER_NAME');
        $user->email = env('DEFAULT_USER_EMAIL');
        $user->password = bcrypt(env('DEFAULT_USER_PASSWORD'));
        $user->save();
        $this->call(UserSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(LikeSeeder::class);
    }
}
