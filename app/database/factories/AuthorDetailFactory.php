<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AuthorDetail>
 */
class AuthorDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            "author_id" => AuthorFactory::new()->create()->id,
            "email" => fake()->unique()->safeEmail(),
            "address" => fake()->address(),
        ];
    }
}
