<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(2)->create();
        \App\Models\Siswa::factory(50)
            ->has(\App\Models\Ekskul::factory()->count(rand(1, 3)))
            ->create();
    }
}
