<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class StoreDetail extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'domain_name',
        'store_name',
        'store_logo',
        'about_store',
        'color',
        'user_id',
        'plan_id',
        'layout_id',
    ];

}
