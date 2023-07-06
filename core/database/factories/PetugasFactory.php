<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Petugas>
 */
class PetugasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_petugas' => fake()->name(),
            'username' => fake()->name(),
            'password' => Hash::make(12345678),
            'telp' => rand(0,12),   
            'level' => 'admin',   
         ];
    }
}
