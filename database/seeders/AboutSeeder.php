<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        About::create([
            'key' => 'description',
            'value' => "Indobeautynesia is Indonesia's trusted online shop which offering authentic beauty care products for female or male such as skincare, make up, hair care, fragrance, beauty tools. Indobeautynesia only sells the authentic and BPOM Certified and also 100% Guaranteed Original, because we have The Authorized Seller's Certificate. Indobeautynesia delivers products throughout Indonesia." 
        ]);

        About::create([
            'key' => 'address',
            'value' => 'Jl. Embong Malang No. 4 -1 Surabaya'
        ]);

        About::create([
            'key' => 'phone',
            'value' => '0812-3123-0123'
        ]);

        About::create([
            'key' => 'email',
            'value' => 'indobeautynesia@gmail.com'
        ]);

        About::create([
            'key' => 'opening1',
            'value' => 'Jumat - Sabtu : 09:00 - 18:00'
        ]);

        About::create([
            'key' => 'opening2',
            'value' => 'Sabtu - Minggu : 09:00 - 15:00'
        ]);

        About::create([
            'key' => 'instagram',
            'value' => '#'
        ]);

        About::create([
            'key' => 'whatsapp',
            'value' => '#'
        ]);

        About::create([
            'key' => 'tiktok',
            'value' => '#'
        ]);

        About::create([
            'key' => 'shopee',
            'value' => '#'
        ]);

        About::create([
            'key' => 'lazada',
            'value' => '#'
        ]);

        About::create([
            'key' => 'tokopedia',
            'value' => '#'
        ]);
    }
}
