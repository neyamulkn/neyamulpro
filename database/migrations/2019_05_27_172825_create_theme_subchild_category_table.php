<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemeSubchildCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_subchild_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subchild_category_name', 60);
            $table->string('subchild_category_url', 60);
            $table->integer('subcategory_id');
            $table->string('status',10);
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
        Schema::dropIfExists('theme_subchild_category');
    }
}
