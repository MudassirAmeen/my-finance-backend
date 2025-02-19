<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\income>
 */
class incomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => fake()->numberBetween(100, 1000),
            'source' => fake()->word(),
            'date' => fake()->date(),
            'description' => fake()->sentence(),
            'user_id' => '2'
        ];
    }
}
