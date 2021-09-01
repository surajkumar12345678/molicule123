<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NullableMakePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merchant_payment_option', function (Blueprint $table) {
            $table->string('payple_client_id',200)->nullable()->change();
			$table->string('payple_secret_id',200)->nullable()->change();
			$table->string('yoco_client_id',200)->nullable()->change();
			$table->string('yoco_secret_id',200)->nullable()->change();
			$table->string('payfast_client_id',200)->nullable()->change();
			$table->string('payfast_secret_id',200)->nullable()->change();
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
