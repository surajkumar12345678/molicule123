<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable=[

        'plan_name',
        'description',
        'number_of_product_allowed',
        'start_date',
        'end_date',
        'price',
        'is_active'

    ];
}
