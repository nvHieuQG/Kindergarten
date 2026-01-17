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
        $adminEmail = env('ADMIN_EMAIL', 'admin@kindergarten.com');
        $adminPassword = env('ADMIN_PASSWORD', '111111');
        $adminName = env('ADMIN_NAME', 'Admin');

        \App\Models\User::firstOrCreate(
            ['email' => $adminEmail],
            [
                'name' => $adminName,
                'password' => bcrypt($adminPassword),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        echo "✅ Admin user created successfully!\n";
        echo "📧 Email: {$adminEmail}\n";
        echo "🔑 Password: {$adminPassword}\n";
        echo "\n";
        echo "⚠️  IMPORTANT: Change ADMIN_EMAIL and ADMIN_PASSWORD in .env file before deploying to production!\n";
    }
}
