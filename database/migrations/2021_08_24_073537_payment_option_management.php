<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaymentOptionManagement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('payment_option_management', function (Blueprint $table) {
         $table->increments('id');
   $table->enum('payment_option',100)->nullable()->change();
   $table->string('payple_client_id',200)->nullable()->change();
   $table->string('payple_secret_id',200)->nullable()->change();
   $table->string('yoco_client_id',200)->nullable()->change();
   $table->string('yoco_secret_id',200)->nullable()->change();
   $table->string('payfast_client_id',200)->nullable()->change();
   $table->string('payfast_secret_id',200)->nullable()->change();
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
