<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = ['Web Design', 'Graphic Design', 'Back End', 'Front End', 'Full Stack'];

        for ($i = 0; $i < 10; $i++) {
            Project::create([
                'title' => $faker->sentence(3),
                'description' => $faker->paragraphs(3, true),
                'type' => $faker->randomElement($types),
            ]);
        }
    }
}