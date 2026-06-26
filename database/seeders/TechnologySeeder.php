<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    private array $colors = [
        '#6366f1', '#ec4899', '#10b981', '#06b6d4',
        '#f59e0b', '#8b5cf6', '#14b8a6', '#f97316',
        '#ef4444', '#3b82f6', '#84cc16', '#d946ef',
    ];

    public function run(): void
    {
        $technologies = [
            'PHP', 'JavaScript', 'TypeScript', 'Python',
            'HTML/CSS', 'Laravel', 'Vue.js', 'React',
            'Node.js', 'SQL/Database', 'Docker', 'Git',
        ];

        foreach ($technologies as $i => $name) {
            Technology::updateOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'slug' => Str::slug($name),
                    'color' => $this->colors[$i % count($this->colors)],
                ],
            );
        }
    }
}
