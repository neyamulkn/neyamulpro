<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemeFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_filters', function (Blueprint $table) {
            $table->increments('filter_id');
            $table->string('filter_name');
            $table->string('category_id');
            $table->string('type');
            $table->string('filter_msg')->nullable();
    });
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theme_filters');
    }
}
