<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    public function run(): void
    {
        $technologies = [
            'PHP', 'JavaScript', 'TypeScript', 'Python',
            'HTML/CSS', 'Laravel', 'Vue.js', 'React',
            'Node.js', 'SQL/Database', 'Docker', 'Git',
        ];

        foreach ($technologies as $name) {
            Technology::firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name, 'slug' => Str::slug($name)],
            );
        }
    }
}
