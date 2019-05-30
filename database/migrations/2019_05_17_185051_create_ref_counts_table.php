<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_counts', function (Blueprint $table) {
           
            $table->increments('id');
            $table->char('ref_username', 25);
            $table->integer('total_view');
            $table->integer('total_item');
             $table->double('ref_earning', 8, 2)->nullable();
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
        Schema::dropIfExists('ref_counts');
    }
}
