<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
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
            'name' => fake()->name(),
            'address' => fake()->streetAddress(),
            'phone' => fake()->phoneNumber(),
            'birthdate' => fake()->date(),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'description' => fake()->text(10),
        ];
    }
}
