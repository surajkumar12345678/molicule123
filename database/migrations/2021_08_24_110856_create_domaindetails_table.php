<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomaindetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domaindetails', function (Blueprint $table) {
            $table->id();
            $table->integer('store_detail_id')->nullable();
            $table->string('domain_name')->nullable();
            $table->string('registrant_id')->nullable();
            $table->integer('createdate')->nullable();
            $table->integer('expiredate')->nullable();
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
        Schema::dropIfExists('domaindetails');
    }
}
