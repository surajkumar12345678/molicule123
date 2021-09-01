<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->string('order_id',100);
            $table->string('name',100);
            $table->string('mobile',100);
            $table->string('city',100);
            $table->integer('Pincode');
            $table->string('address',200);
            $table->enum('payment_type', ['1', '2'])->comment('1=>Bank Transfer, 2=>COD')->default('2');
            $table->string('paymt_txnid',200)->nullable();
            $table->decimal('sub_total', 18, 2)->default('0.00');
            $table->decimal('discount', 18, 2)->default('0.00');
            $table->decimal('net_amount', 18, 2)->default('0.00');
            $table->integer('promocode_id')->default('0');
            $table->decimal('promocode_amount', 18, 2)->default('0.00');
            $table->enum('status', ['0', '1'])->default('0');
            $table->rememberToken();
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
