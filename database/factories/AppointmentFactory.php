<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id' => 1,
            'doctor_id' => 1,
            'room_id' => 1,
            'date' => fake()->dateTime(),
            'status' => fake()->randomElement(['pending', 'confirmed', 'completed', 'cancelled']),
        ];
    }
}
