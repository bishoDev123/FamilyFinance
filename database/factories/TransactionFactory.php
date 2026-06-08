<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 2,
            'plan_id' => 4,
            'amount' => $this->faker->randomDigitNotZero(),
            'description' => $this->faker->sentence(),
            'type' => $this->faker->randomElement(['deposit', 'withdraw']),
        ];
    }
}
