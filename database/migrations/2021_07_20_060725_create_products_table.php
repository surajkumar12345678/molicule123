<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories', 'id')->onDelete(NULL)->onUpdate('CASCADE');
            $table->string('title');
            $table->string('description');
            $table->string('feature_image');
            $table->string('product_type');
            $table->string('sku');
            $table->string('price')->nullable();
            $table->string('gtin')->nullable();
            $table->string('stock')->nullable();
            $table->string('price_in_currency_set')->nullable();
            $table->string('product_mode')->nullable();
            $table->string('digital_file')->nullable();
            $table->string('shipping')->nullable();
            $table->string('best_seller')->nullable();
            $table->string('weight')->nullable();
            $table->string('feature_home')->nullable();
            $table->string('feature_category')->nullable();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('store_detail_id')->constrained('store_details', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
