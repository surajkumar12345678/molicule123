<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'title',
        'description',
        'product_type',
        'category_id',
        'feature_image',
        'sku',
        'price',
        'stock',
        'gtin',
        'price_in_currency_set',
        'product_mode',
        'digital_file',
        'shipping',
        'best_seller',
        'weight',
        'feature_home',
        'feature_category',
        'user_id',
        'store_detail_id'
    ];
        public function categories()
        {
            return $this->hasMany(Category::class, 'id');
        }
}
