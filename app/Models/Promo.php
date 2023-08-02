<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'discount',
        'description',
        'is_active'
        // tambahkan kolom lain yang diperlukan
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
