<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'discount',
        'stock_quantity',
        'category_id',
        'sub_category_id',
        'brand_id',
        'featured',
        'is_active',
        'image',
        'gallery_image',
        'slug',
        'weight',
        'dimensions',
        'tags',
        'language',
        'sizes',
        'colors',
        'unit'
    ];

}
