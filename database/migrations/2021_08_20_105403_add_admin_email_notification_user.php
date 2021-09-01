<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdminEmailNotificationUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
			$table->enum('new_merchant', ['0', '1'])->default('0')->after('store_detail_id');
			$table->enum('cancell', ['0', '1'])->default('0')->after('new_merchant');
			$table->enum('upgraded', ['0', '1'])->default('0')->after('cancell');
			$table->enum('trial_expire', ['0', '1'])->default('0')->after('upgraded');
			$table->enum('not_setup', ['0', '1'])->default('0')->after('trial_expire');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
