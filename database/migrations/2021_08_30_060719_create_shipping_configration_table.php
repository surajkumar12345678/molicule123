<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingConfigrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_configration', function (Blueprint $table) {
            $table->id();
            $table->string('method_name');
            $table->string('shipping_instruction');
            $table->string('status');
            $table->string('total');
            $table->string('geozone');
            $table->string('total');
            $table->string('geozone');
            $table->string('cost_type');
            $table->string('flatcost')->nullable();;
            $table->string('cardfrom')->nullable();;
            $table->string('cardto')->nullable();;
            $table->string('shippingcost')->nullable();;
            $table->string('weight')->nullable();;
            $table->string('weightcost')->nullable();;
            $table->string('total1');
            $table->string('totalbasedcost');
            $table->string('taxclass');
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
        Schema::dropIfExists('shipping_configration');
    }
}
