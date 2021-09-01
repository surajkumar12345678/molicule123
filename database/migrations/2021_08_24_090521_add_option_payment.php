<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOptionPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merchant_payment_option', function (Blueprint $table) {
			$table->dropColumn('payple_client_id');
			$table->dropColumn('payple_secret_id');
            $table->string('payple_username',200)->nullable()->after('payment_gateway');
			$table->string('payple_password',200)->nullable()->after('payple_username');
			$table->string('payple_signature',200)->nullable()->after('payple_password');
			$table->enum('payple_option', ['1', '0'])->default('0')->after('payple_signature');
			$table->enum('yoco_option', ['1', '0'])->default('0')->after('yoco_secret_id');
			$table->enum('payfast_option', ['1', '0'])->default('0')->after('payfast_secret_id');
			
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
