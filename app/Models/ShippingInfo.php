<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'country',
        'state',
        'location',
        'rate',
        'maximum_weight',
        'is_freeshipping',
        'weight',
        'user_id',
        'store_detail_id'
    ];
}
