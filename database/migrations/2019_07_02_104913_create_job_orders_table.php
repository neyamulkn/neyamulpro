<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->char('order_id', 50);
            $table->integer('job_id');
            $table->integer('proposal_id');
            $table->text('wor_description')->nullable();
            $table->integer('freelancer_id');
            $table->integer('buyer_id');
            $table->double('proposal_budget', 8,2);
            $table->char('payment_method', 10);
            $table->char('transection_id', 100);
            $table->string('status');
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
        Schema::dropIfExists('job_orders');
    }
}
