<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->increments('theme_id');
            $table->integer('user_id');
            $table->char('theme_name', 255);
            $table->char('theme_url', 255);
            $table->text('summary');
            $table->text('description');
            $table->integer('category_id');
            $table->integer('sub_category');
            $table->integer('child_category')->nullable();
            $table->char('demo_url', 255)->nullable();
            $table->char('screenshort_url', 255)->nullable();
            $table->text('search_tag');
            $table->double('price_regular', 8, 2);
            $table->double('price_extented', 8, 2);
            $table->char('main_file', 255);
            $table->char('main_image', 255);
            $table->char('status', 10);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('themes');
    }
}
