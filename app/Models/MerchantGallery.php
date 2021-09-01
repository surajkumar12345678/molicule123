<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantGallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'status',
        'user_id',
        'store_detail_id'
    ];
}
