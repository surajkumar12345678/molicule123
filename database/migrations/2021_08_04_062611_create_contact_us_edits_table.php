<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsEditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us_edits', function (Blueprint $table) {
            $table->id();
            $table->string('header_image')->nullable();
            $table->string('address')->nullable();
            $table->string('phoneno')->nullable();
            $table->string('alternative_phoneno')->nullable();
            $table->string('email_address')->nullable();
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
        Schema::dropIfExists('contact_us_edits');
    }
}
