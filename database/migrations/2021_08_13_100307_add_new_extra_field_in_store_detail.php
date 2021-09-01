<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewExtraFieldInStoreDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('store_details', function (Blueprint $table) {
            $table->string('domain_type')->after('layout_id')->nullable();
			$table->string('facebook_link')->after('domain_type')->nullable();
			$table->string('instagram_link')->after('facebook_link')->nullable();
			$table->string('twitter_link')->after('instagram_link')->nullable();
			$table->string('linkedin_link')->after('twitter_link')->nullable();
			$table->string('youtube_link')->after('linkedin_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('store_detail', function (Blueprint $table) {
            //
        });
    }
}
