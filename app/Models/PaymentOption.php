<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'online',
        'online_link',
        'is_cash_on_delivery',
        'paypal',
        'paypal_link',
        'payfast',
        'payfast_link',
        'yoco',
        'yoco_link',
        'user_id',
        'store_detail_id'
    ];
}
