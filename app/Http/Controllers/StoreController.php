<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $product_category =ProductCategory::take(10)->get();
        $featured_product_category =ProductCategory::take(5)->get();
        return view('web-layouts.index', compact('product_category', 'featured_product_category'));
    }
}
