<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusPaumentGateway extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merchant_payment_option', function (Blueprint $table) {
            $table->dropColumn('payment_option');
			$table->enum('COD', ['1', '0'])->default('1')->after('id');
			$table->enum('payment_gateway', ['1', '0'])->default('1')->after('COD');
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
