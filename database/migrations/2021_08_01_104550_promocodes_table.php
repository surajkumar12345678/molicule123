<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PromocodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocodes', function (Blueprint $table) {
            $table->id();
            $table->string('promocode')->nullable();
            $table->string('description')->nullable();
            $table->string('discount_percentage')->nullable();
            $table->string('fixed_rate_discount')->nullable();
            $table->string('specific_product')->nullable();
            $table->string('promocode_mode')->nullable();
            $table->string('no_of_time_used')->nullable();
            $table->string('validity')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('promocodes');
    }
}
