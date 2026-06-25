<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin User', 'password' => bcrypt('password')],
        );

        $this->call([
            TypeSeeder::class,
            TechnologySeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
