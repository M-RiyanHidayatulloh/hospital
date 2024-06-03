<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'usertype' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123'),
            'usertype' => 'user'
        ]);

        User::factory()->create([
            'name' => 'doctor',
            'email' => 'doctor@gmail.com',
            'password' => bcrypt('123'),
            'usertype' => 'doctor'
        ]);

        $this->call([
            PatientSeeder::class,
            DoctorSeeder::class,
            RoomSeeder::class,
            AppointmentSeeder::class
        ]);


    }
}
