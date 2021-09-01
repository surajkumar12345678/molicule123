<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SalesOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_details', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->string('order_id',100);
            $table->string('product_name',100);
            $table->string('product_image',100);
            $table->integer('qty');
            $table->decimal('sub_total', 18, 2)->default('0.00');
            $table->decimal('discount', 18, 2)->default('0.00');
            $table->decimal('net_amount', 18, 2)->default('0.00');
            $table->enum('order_status', ['0', '1'])->default('0');
            $table->enum('payment_status', ['0', '1'])->default('0');
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
