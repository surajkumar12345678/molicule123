<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsEdit extends Model
{
    use HasFactory;
    protected $fillable = [
        'header_image',
        'address',
        'phoneno',
        'alternative_phoneno',
        'email_address',
        'status',
        'user_id',
        'store_detail_id'
    ];
}
