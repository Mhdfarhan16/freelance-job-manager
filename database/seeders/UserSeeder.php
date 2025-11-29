<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Freelancer One',
            'email' => 'freelancer1@example.com',
            'password' => Hash::make('password123')
        ]);

        User::create([
            'name' => 'Freelancer Two',
            'email' => 'freelancer2@example.com',
            'password' => Hash::make('password123')
        ]);
    }
}
