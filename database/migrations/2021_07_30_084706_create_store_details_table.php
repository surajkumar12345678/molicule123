<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_detail_news', function (Blueprint $table) {
            $table->id();
            $table->string('store_name')->nullable();
            $table->string('store_logo')->nullable();
            $table->string('about_store')->nullable();
            $table->string('domain_name')->nullable();
            $table->string('color')->nullable();
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('plan_id')->constrained('plans', 'id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('layout_id')->constrained('layouts', 'id')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('store_details');
    }
}
