<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'title',
    ];

    function getProducts(){
        return $this->hasMany(Product::class);
    }
}
