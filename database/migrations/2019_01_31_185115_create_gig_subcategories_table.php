<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGigSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gig_subcategories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subcategory_name', 60);
            $table->string('subcategory_url', 60);
            $table->integer('category_id');
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
        Schema::dropIfExists('gig_subcategories');
    }
}
