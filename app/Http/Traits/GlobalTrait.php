<?php

namespace App\Http\Traits;

use App\Models\About;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use stdClass;

trait GlobalTrait {
    public function getAllVariables() {
        $categories = Category::all();
        $brands = Brand::all();
        $new_arrival = Product::limit(3)->latest()->get();

        $description = About::where('key','description')->first();
        $address = About::where('key','address')->first();
        $phone = About::where('key','phone')->first();
        $email = About::where('key','email')->first();
        $opening1 = About::where('key','opening1')->first();
        $opening2 = About::where('key','opening2')->first();
        $instagram = About::where('key','instagram')->first();
        $whatsapp = About::where('key','whatsapp')->first();
        $tiktok = About::where('key','tiktok')->first();
        $lazada = About::where('key','lazada')->first();
        $shopee = About::where('key','shopee')->first();
        $tokopedia = About::where('key','tokopedia')->first();

        $data = new stdClass();
        $data->description = $description->value;
        $data->address = $address->value;
        $data->phone = $phone->value;
        $data->email = $email->value;
        $data->opening1 = $opening1->value;
        $data->opening2 = $opening2->value;
        $data->instagram = $instagram->value;
        $data->whatsapp = $whatsapp->value;
        $data->tiktok = $tiktok->value;
        $data->lazada = $lazada->value;
        $data->shopee = $shopee->value;
        $data->tokopedia = $tokopedia->value;

        $data->categories = $categories;
        $data->brands = $brands;
        $data->new_arrival = $new_arrival;

        return $data;
    }
}