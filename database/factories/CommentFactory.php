<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $created = $this->faker->dateTimeBetween('-3 years', 'now');
        $updated = $created;
        if(rand(0,3)) {
            $updated = $this->faker->dateTimeBetween($created, 'now');
        }

        return [
            'body' => $this->faker->paragraph,
            'updated_at' => $updated,
            'created_at' => $created
        ];
    }
}
