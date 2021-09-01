<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MerchantSocialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('merchant_social_option', function (Blueprint $table) {
            $table->increments('id');
			$table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
			$table->string('facebook',100)->nullable();
			$table->string('instagram',100)->nullable();
			$table->string('youtube',100)->nullable();
			$table->string('linkedin',100)->nullable();
			$table->string('twitter',100)->nullable();
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
