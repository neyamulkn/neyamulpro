<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkplaceSubcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workplace_subcategory', function (Blueprint $table) {
            $table->increments('id');
            $table->char('subcategory_name', 30);
            $table->char('subcategory_url', 30);
            $table->integer('category_id');
            $table->integer('sorting')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('workplace_subcategory');
    }
}
