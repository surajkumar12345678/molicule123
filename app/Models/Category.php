<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'status',
        'user_id',
        'store_detail_id'
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
