<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleColumnsToPromocodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('promocodes', function (Blueprint $table) {
            $table->id()->autoIncrement()->change();
            $table->bigInteger('discount_percentage')->nullable()->change();
            $table->decimal('fixed_rate_discount',18,2)->nullable()->change();
            $table->Integer('no_of_time_used')->nullable()->change();
            $table->Integer('max_time_one_user')->nullable();
            $table->string('discount_type')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promocodes', function (Blueprint $table) {
            //
        });
    }
}
