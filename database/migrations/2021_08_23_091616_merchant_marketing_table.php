<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MerchantMarketingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('merchant_marketing_option', function (Blueprint $table) {
            $table->increments('id');
			$table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
			$table->string('google_nalytics',100)->nullable();
			$table->string('facebook_pixel',100)->nullable();
			$table->string('google_shopping_feed',100)->nullable();
			$table->string('facebook_shop_feed',100)->nullable();
			$table->string('instagram_shop_feed',100)->nullable();
			$table->string('whatsApp_chat',100)->nullable();
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
