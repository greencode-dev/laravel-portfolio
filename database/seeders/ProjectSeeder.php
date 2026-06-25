<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $typeIds = Type::pluck('id');

        for ($i = 0; $i < 10; $i++) {
            Project::create([
                'title' => $faker->sentence(3),
                'description' => $faker->paragraphs(3, true),
                'type_id' => $faker->randomElement($typeIds),
            ]);
        }
    }
}