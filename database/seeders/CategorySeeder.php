<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Politics',
            'Business',
            'Technology',
            'Culture',
            'Sports',
        ];

        foreach ($categories as $categoryName) {
            Category::query()->create([
                'name' => $categoryName
            ]);
        }
    }
}
