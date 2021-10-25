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
        $user->password = env('DEFAULT_USER_PASSWORD');
        $user->save();
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
    }
}
