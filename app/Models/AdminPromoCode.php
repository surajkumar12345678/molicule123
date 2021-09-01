<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPromoCode extends Model
{
    use HasFactory;
    protected $table="promo_codes";
    protected $fillable=[
            "promo_code",
            "actual_discount",
            "discount_type",
            "is_specific",
            "product_category_id",
            "no_of_times",
            'valid_until'
    ];
}
