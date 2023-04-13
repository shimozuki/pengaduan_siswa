<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Masyarakat::factory()->create([
            'nik' => '1234567890111213',
            'username' => 'user',
            'telp' => '1022424252328',
        ]);
        
        \App\Models\Petugas::factory()->create([
            'username' => 'admin',
        ]);
    }
}
