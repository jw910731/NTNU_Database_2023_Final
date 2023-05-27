<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name'=> 'admin',
            'email'=> 'admin@example.com',
            'password'=> '$2y$10$s2pTlhIXEv05JRaOKox2p.CSY2QvTwODKnT4s8S1P0nLwezgpUp9G', // Password: deadpanda
            'is_admin'=> true,
        ]);
    }
}
