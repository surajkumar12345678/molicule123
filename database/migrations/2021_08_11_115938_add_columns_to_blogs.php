<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToBlogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('category');
            $table->string('slug');
            $table->longText('body')->nullable()->change();
            $table->foreignId('blog_category_id')->constrained('blog_categories', 'id');
        });
        \DB::statement("ALTER TABLE `blogs` CHANGE `status` `status` ENUM('1', '0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' AFTER `image`;");
        \DB::statement("ALTER TABLE `blogs` CHANGE `feature_home` `feature_home` ENUM('1', '0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' AFTER `image`;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            //
        });
    }
}
