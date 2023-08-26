<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'brand_id',
        'is_bundle',
        'price',
        'package_weight',
        'description',
        'photo'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function promo()
    {
        return $this->belongsTo(Promo::class, 'promo_id');
    }

}
