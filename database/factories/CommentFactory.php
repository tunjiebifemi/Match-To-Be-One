<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        // do {
        //     $commentable_id = rand(1, 10);
        //     $user_id = rand(1, 30);
        //     // $array = ['App\Models\Post', 'App\Models\Comment'];
        // }   while (1 ===1);
    
        return [
            'comment' => $this->faker->sentence,
            'user_id' => rand(1, 30),
            'commentable_id' => rand(40, 50),
            'commentable_type' => 'App\Models\Comment',
        ];
    }
}
