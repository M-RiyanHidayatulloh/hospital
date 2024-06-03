<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $number = 1;
        return [
            // room_number menggunakan static $number dan increment
            // contoh room number yang saya inginkan yaitu '001','002','003',...
            'room_number' => str_pad($number++, 3, '0', STR_PAD_LEFT),
            'room_type' => fake()->randomElement(['ICU', 'General', 'VIP']),
            'availability' => fake()->randomElement(['available', 'occupied', 'maintenance']),
            'capacity' => fake()->numberBetween(1, 10)
        ];
    }
}
