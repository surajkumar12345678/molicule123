<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_infos', function (Blueprint $table) {
            $table->id();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('location')->nullable();
            $table->string('rate')->nullable();
            $table->string('maximum_weight')->nullable();
            $table->boolean('is_freeshipping')->nullable();
            $table->string('weight')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users', 'id');
            $table->foreignId('store_detail_id')->nullable()->constrained('store_details', 'id');
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
        Schema::dropIfExists('shipping_infos');
    }
}
