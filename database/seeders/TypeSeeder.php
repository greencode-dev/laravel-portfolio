<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = config('projects.types', [
            'Web Design', 'Graphic Design', 'Front End', 'Back End',
            'Full Stack', 'Mobile', 'API', 'Design System',
        ]);

        foreach ($types as $name) {
            Type::firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name, 'slug' => Str::slug($name)],
            );
        }
    }
}
