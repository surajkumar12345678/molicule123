<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MerchantPaymentOption extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('merchant_payment_option', function (Blueprint $table) {
            $table->increments('id');
			$table->enum('payment_option', ['COD', 'Payment_Gateways'])->default('COD');
			$table->string('payple_client_id',200);
			$table->string('payple_secret_id',200);
			$table->string('yoco_client_id',200);
			$table->string('yoco_secret_id',200);
			$table->string('payfast_client_id',200);
			$table->string('payfast_secret_id',200);
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
