<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    private array $colors = [
        '#6366f1', // Indigo
        '#ec4899', // Pink
        '#10b981', // Emerald
        '#06b6d4', // Cyan
        '#f59e0b', // Amber
        '#8b5cf6', // Violet
        '#14b8a6', // Teal
        '#f97316', // Orange
    ];

    public function run(): void
    {
        $types = config('projects.types', [
            'Web Design', 'Graphic Design', 'Front End', 'Back End',
            'Full Stack', 'Mobile', 'API', 'Design System',
        ]);

        foreach ($types as $i => $name) {
            Type::updateOrCreate(
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
