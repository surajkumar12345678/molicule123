<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->hasMany(Product::class, 'id');
    }
    public function categories()
    {
        return $this->hasMany(Category::class, 'id');
    }
}
