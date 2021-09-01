<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MerchantMailchimpInMarketingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merchant_marketing_option', function (Blueprint $table) {
			$table->string('mailchimp_api',100)->nullable()->change('user_id');
			$table->string('mailchimp_list',100)->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merchant_marketing_option', function (Blueprint $table) {
            //
        });
    }
}
