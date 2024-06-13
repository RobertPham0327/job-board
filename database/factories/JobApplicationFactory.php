<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobApplication>
 */
class JobApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'expected_salary' => fake()->numberBetween(4_000, 170_000),
            'user_id' => fake()->numberBetween(1, 10),
            'career_id' => fake()->numberBetween(16, 21),
        ];
    }
}
