<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 3,
            'doctor_name' => fake()->name(),
            'image' => fake()->imageUrl(),
            'specialization' => fake()->sentence(10),
            'phone' => fake()->phoneNumber(),
            'available_times' => fake()->dateTime(),
        ];
    }
}
