<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $incrementing = false;
    
    protected $fillable = [
        'title',
        'description',
        'price',
        'discountPercentage',
        'rating',
        'stock',
        'brand',
        'category',
        'category_id',
        'thumbnail',
        'images',
    ];

    protected $casts =[
        'images' => 'array'
    ];
}
