<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $typeIds = Type::pluck('id');
        $technologyIds = Technology::pluck('id');

        for ($i = 0; $i < 10; $i++) {
            $project = Project::create([
                'title' => $faker->sentence(3),
                'description' => $faker->paragraphs(3, true),
                'type_id' => $faker->randomElement($typeIds),
            ]);

            $project->technologies()->sync($faker->randomElements($technologyIds, rand(2, 3)));
        }
    }
}
