<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Brand::create([
            'name' => 'Acnes'
        ]);

        Brand::create([
            'name' => 'Azarine'
        ]);

        Brand::create([
            'name' => 'Emina'
        ]);

        Brand::create([
            'name' => 'Garnier'
        ]);

        Brand::create([
            'name' => 'Make Over'
        ]);

        Brand::create([
            'name' => 'Herborist'
        ]);

        Brand::create([
            'name' => 'Miranda'
        ]);

        Brand::create([
            'name' => 'Purbasari'
        ]);

        Brand::create([
            'name' => 'Wardah'
        ]);

        Brand::create([
            'name' => 'Viva'
        ]);

        Brand::create([
            'name' => 'Vaseline'
        ]);

        Brand::create([
            'name' => 'Himalaya'
        ]);

        Brand::create([
            'name' => 'Implora'
        ]);

        Brand::create([
            'name' => 'Madame Gie'
        ]);

        Brand::create([
            'name' => 'Kahf'
        ]);

        Brand::create([
            'name' => 'Skin Aqua'
        ]);

        Brand::create([
            'name' => 'Safi'
        ]);
    }
}
