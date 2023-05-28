<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Faker\Factory;
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
        
        $data = [
            ['name' => 'architect'],
            ['name' => 'artist'],
            ['name' => 'astronaut'],
            ['name' => 'astronomer'],
            ['name' => 'baker'],
            ['name' => 'barber'],
            ['name' => 'butcher'],
            ['name' => 'bus driver'],
            ['name' => 'businessman'],
            ['name' => 'car mechanic'],
            ['name' => 'cashier'],
            ['name' => 'chef / cook'],
            ['name' => 'computer programmer'],
            ['name' => 'detective'],
            ['name' => 'director'],
            ['name' => 'doctor'],
            ['name' => 'farmer'],
            ['name' => 'fighter pilot'],
            ['name' => 'firefighter'],
            ['name' => 'flight attendant'],
            ['name' => 'football player'],
            ['name' => 'hairdresser'],
            ['name' => 'judge'],
            ['name' => 'maid'],
            ['name' => 'make-up artist'],
            ['name' => 'miner'],
            ['name' => 'musician'],
            ['name' => 'nurse'],
            ['name' => 'office worker'],
            ['name' => 'optician'],
            ['name' => 'pharmacist'],
            ['name' => 'photographer'],
            ['name' => 'pilot'],
            ['name' => 'plumber'],
            ['name' => 'police officer'],
            ['name' => 'postman'],
            ['name' => 'professional golf player'],
            ['name' => 'reporter'],
            ['name' => 'sailor'],
            ['name' => 'scientist'],
            ['name' => 'soldier'],
            ['name' => 'surgeon'],
            ['name' => 'taxi driver'],
            ['name' => 'teacher'],
            ['name' => 'tour guide'],
            ['name' => 'vet'],
            ['name' => 'waiter'],
            ['name' => 'waitress']
        ];
        
        \App\Models\Occupation::insert($data);

        User::create([
            'name'=> 'admin',
            'email'=> 'admin@example.com',
            'password'=> '$2y$10$s2pTlhIXEv05JRaOKox2p.CSY2QvTwODKnT4s8S1P0nLwezgpUp9G', // Password: deadpanda
            'is_admin'=> true,
            'occupation_id' => \App\Models\Occupation::inRandomOrder()->first()->id,
            'gender' => true,
            'age' => 18
        ]);
    }
}
