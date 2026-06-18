<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('projects')->insert([
                'name' => $faker->sentence(3),
                'category' => $faker->word(),
                'description' => $faker->paragraph(),
                'status' => $faker->randomElement(['Pending', 'In Progress', 'Completed']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
