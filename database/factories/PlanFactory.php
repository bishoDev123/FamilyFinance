<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $month = $this->faker->monthName();

        return [
            'title' => "Plan for $month",
            'description' => $this->faker->paragraph(),
            'budget' => $this->faker->numberBetween(1000, 10000),
            'user_id' => User::factory(),
        ];
    }
}
