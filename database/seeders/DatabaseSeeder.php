<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Layout;
use App\Models\Plan;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductType;
use App\Models\StoreDetail;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        ProductType::create([
            'product_type_name'=>'Simple Product'
        ]);
        ProductType::create([
            'product_type_name'=>'Variable Product'
        ]);
        User::factory(10)->create();
        Layout::factory(10)->create();
        Plan::factory(5)->create();
        StoreDetail::factory(10)->create();
        Category::factory(10)->create();
        Product::factory(10)->create();
        ProductCategory::factory(20)->create();
    }
}
