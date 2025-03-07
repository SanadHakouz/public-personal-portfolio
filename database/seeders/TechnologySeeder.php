<?php

namespace Database\Seeders;

use App\Models\Technology;
use App\Models\TechnologyCategory;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define categories with their Font Awesome icons and colors
        $categories = [
            [
                'name' => 'Frontend Development',
                'icon' => 'laptop-code',
                'color' => 'indigo-500',
                'technologies' => [
                    'HTML, CSS, Bootstrap, Tailwind CSS',
                    'JavaScript (Basic)',
                    'React'
                ]
            ],
            [
                'name' => 'Backend Development',
                'icon' => 'server',
                'color' => 'blue-500',
                'technologies' => [
                    'PHP, Laravel (Blade, Breeze, Livewire)',
                    'RESTful APIs'
                ]
            ],
            [
                'name' => 'Databases',
                'icon' => 'database',
                'color' => 'yellow-500',
                'technologies' => [
                    'MySQL, SQLite'
                ]
            ],
            [
                'name' => 'Mobile Development',
                'icon' => 'mobile-alt',
                'color' => 'purple-500',
                'technologies' => [
                    'Flutter, Dart'
                ]
            ],
            [
                'name' => 'DevOps & Tools',
                'icon' => 'tools',
                'color' => 'red-500',
                'technologies' => [
                    'Git, Docker, Postman, Herd'
                ]
            ],
        ];

        // Create categories and technologies
        foreach ($categories as $index => $categoryData) {
            $category = TechnologyCategory::create([
                'name' => $categoryData['name'],
                'icon' => $categoryData['icon'],
                'color' => $categoryData['color'],
                'display_order' => $index,
            ]);

            foreach ($categoryData['technologies'] as $techIndex => $techName) {
                Technology::create([
                    'category_id' => $category->id,
                    'name' => $techName,
                    'display_order' => $techIndex,
                    'is_active' => true,
                ]);
            }
        }
    }
}
