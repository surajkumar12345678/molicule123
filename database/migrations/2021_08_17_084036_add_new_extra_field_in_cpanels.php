<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewExtraFieldInCpanels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cpanels', function (Blueprint $table) {
            $table->string('ns1')->after('theme')->nullable();
			$table->string('ns2')->after('ns1')->nullable();
			$table->string('record_a')->after('ns2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cpanels', function (Blueprint $table) {
            //
        });
    }
}
