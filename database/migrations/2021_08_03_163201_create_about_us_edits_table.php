<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsEditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us_edits', function (Blueprint $table) {
            $table->id();
            $table->string('header_image')->nullable();
            $table->string('welcome_text')->nullable();
            $table->string('aboutus_image')->nullable();
            $table->longText('aboutus_text')->nullable();
            $table->string('customer_image')->nullable();
            $table->longText('customer_text')->nullable();
            $table->string('hotline_number')->nullable();
            $table->string('hotline_image')->nullable();
            $table->longText('hotline_text')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('about_us_edits');
    }
}
