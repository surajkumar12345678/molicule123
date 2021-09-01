<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('store_detail_id')->constrained('store_details', 'id');
            $table->boolean('paypal')->nullable();
            $table->string('paypal_link')->nullable();
            $table->boolean('online')->nullable();
            $table->string('online_link')->nullable();
            $table->boolean('payfast')->nullable();
            $table->string('payfast_link')->nullable();
            $table->boolean('yoco')->nullable();
            $table->string('yoco_link')->nullable();
            $table->boolean('is_cash_on_delivery')->nullable();
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
        Schema::dropIfExists('payment_options');
    }
}
