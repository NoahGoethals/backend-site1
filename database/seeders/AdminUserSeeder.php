<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@ehb.be'],
            [
                'name' => 'Admin',
                'username' => 'admin',
                'bio' => 'Ik ben de admin van deze site.',
                'birthdate' => '1990-01-01',
                'image' => null, // of geef pad als je wil testen
                'password' => Hash::make('Password!321'),
                'email_verified_at' => now(),
            ]
        );
    }
}
