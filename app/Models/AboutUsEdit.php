<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsEdit extends Model
{
    use HasFactory;
    protected $fillable = [
        'header_image',
        'welcome_text',
        'aboutus_image',
        'aboutus_text',
        'customer_image',
        'customer_text',
        'hotline_number',
        'hotline_image',
        'hotline_text',
        'user_id',
        'store_detail_id',
        'status'
    ];
}
