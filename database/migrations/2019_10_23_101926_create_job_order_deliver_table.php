<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobOrderDeliverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_order_deliver', function (Blueprint $table) {
            $table->increments('deliver_id');
            $table->char('order_id', 25);
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
        Schema::dropIfExists('job_order_deliver');
    }
}
