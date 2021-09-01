<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductCombination extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_combination', function (Blueprint $table) {
            $table->id();
			$table->string('product_attribute_id');
            $table->foreignId('product_id')->constrained('products', 'id');
            $table->string('value_id');
            $table->decimal('price', 18, 2)->default('0.00');
            $table->decimal('stock', 18, 2)->default('0.00'); 
            $table->longtext('description');
            $table->integer('weight');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
