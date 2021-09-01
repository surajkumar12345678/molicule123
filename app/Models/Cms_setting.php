<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cms_setting extends Model
{
    use HasFactory;

    protected $fillable=['font_color','font_hover_color','active_color','whishlist_color','cart_color','store_detail_id','button_color'];
}
