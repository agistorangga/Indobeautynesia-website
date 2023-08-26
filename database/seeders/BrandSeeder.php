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
            'name' => 'Acnes',
            'image' => 'logobrand/logo-acnes.jpeg'
        ]);

        Brand::create([
            'name' => 'Azarine',
            'image' => 'logobrand/logo-azarine.jpg'
        ]);

        Brand::create([
            'name' => 'Emina',
            'image' => 'logobrand/logo-emina.png'
        ]);

        Brand::create([
            'name' => 'Garnier',
            'image' => 'logobrand/logo-garnier.png'
        ]);

        Brand::create([
            'name' => 'Herborist',
            'image' => 'logobrand/logo-herborist.png'
        ]);

        Brand::create([
            'name' => 'Implora',
            'image' => 'logobrand/logo-implora.webp'
        ]);

        Brand::create([
            'name' => 'Make Over',
            'image' => 'logobrand/logo-makeover.webp'
        ]);

        Brand::create([
            'name' => 'Miranda',
            'image' => 'logobrand/logo-miranda.png'
        ]);

        Brand::create([
            'name' => 'Safi',
            'image' => 'logobrand/logo-safi.jpg'
        ]);

        Brand::create([
            'name' => 'Wardah',
            'image' => 'logobrand/logo-wardah.png'
        ]);
    }
}
