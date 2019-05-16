<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDeliversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_delivers', function (Blueprint $table) {
            $table->increments('deliver_id');
            $table->char('deliver_order_id', 25);
            $table->integer('user_id');
            $table->char('work_file', 255)->nullable();
            $table->char('msg', 255)->nullable();
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
        Schema::dropIfExists('order_delivers');
    }
}
