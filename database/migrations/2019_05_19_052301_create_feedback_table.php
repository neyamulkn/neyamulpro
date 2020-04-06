<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->increments('feedback_id');
            $table->char('order_id', 11);
            $table->integer('gig_id');
            $table->integer('seller_id');
            $table->integer('buyer_id');
            $table->integer('com_seller')->nullable();
            $table->integer('service_describe')->nullable();
            $table->integer('buy_again_recommend')->nullable();
            $table->char('feadback_msg', 255)->nullable();
            $table->integer('buyer_ratting', 255)->nullable();
            $table->char('buyer_feadback_msg', 255)->nullable();
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
        Schema::dropIfExists('feedback');
    }
}
