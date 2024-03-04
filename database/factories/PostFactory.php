<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'summery' => $this->faker->text(50),
            'content' => $this->faker->text()
        ];
    }
}
