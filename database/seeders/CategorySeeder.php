<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::create([
            'name' => 'Skincare',
        ]);

        Category::create([
            'name' => 'Make Up',
        ]);

        Category::create([
            'name' => 'Hair Care',
        ]);

        Category::create([
            'name' => 'Body Care',
        ]);

        Category::create([
            'name' => 'Fragrance',
        ]);

        Category::create([
            'name' => 'Beauty Tools',
        ]);
    }
}
