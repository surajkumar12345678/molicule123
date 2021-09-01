<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminMarketingOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_marketing_option', function (Blueprint $table) {
            $table->id();
      			$table->string('google_nalytics',100)->nullable()->change();
      			$table->string('facebook_pixel',100)->nullable()->change();
      			$table->string('google_shopping_feed',100)->nullable()->change();
      			$table->string('facebook_shop_feed',100)->nullable()->change();
      			$table->string('instagram_shop_feed',100)->nullable()->change();
      			$table->string('whatsApp_chat',100)->nullable()->change();
            $table->string('mailchaimp_api_key',100)->nullable()->change();
            $table->string('mailchaimp_api_list',100)->nullable()->change();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_marketing_option');
    }
}
