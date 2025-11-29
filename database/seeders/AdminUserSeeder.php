<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::firstOrCreate(
            ['email' => 'admin@kindergarten.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('111111'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        echo "Admin user created successfully!\n";
        echo "Email: admin@kindergarten.com\n";
        echo "Password: 111111\n";
    }
}
