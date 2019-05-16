<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderRequirementAnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_requirement_ans', function (Blueprint $table) {
            $table->increments('requirement_id');
            $table->integer('gig_id');
            $table->char('order_id', 25);
            $table->string('requirement_ans', 2500)->nullable();
            $table->string('attach_file')->nullable();
            $table->integer('buyer_id');
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
        Schema::dropIfExists('order_requirement_ans');
    }
}
