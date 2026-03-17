<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class ChirpSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::count() < 3
            ? collect([
                User::create([
                    'name' => 'Alice Developer',
                    'email' => 'alice@example.com',
                    'password' => bcrypt('password'),
                ]),
                User::create([
                    'name' => 'Bob Builder',
                    'email' => 'bob@example.com',
                    'password' => bcrypt('password'),
                ]),
                User::create([
                    'name' => 'Charlie Coder',
                    'email' => 'charlie@example.com',
                    'password' => bcrypt('password'),
                ]),
            ])
            : User::take(3)->get();

        foreach ([
            'Just discovered Laravel 🚀',
            'Building something cool with Chirper!',
            'Eloquent ORM is pure magic ✨',
        ] as $message) {
            $users->random()->chirps()->create([
                'message' => $message,
            ]);
        }
    }
}
