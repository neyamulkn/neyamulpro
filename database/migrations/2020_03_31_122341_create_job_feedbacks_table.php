<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->char('order_id', 11);
            $table->integer('job_id');
            $table->integer('buyer_id');
            $table->integer('freelancer_id');
            $table->integer('ratting_freelancer')->nullable();
            $table->integer('ratting_buyer')->nullable();
            $table->text('feedback_buyer')->nullable();
            $table->text('feedback_freelancer')->nullable();
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
        Schema::dropIfExists('job_feedbacks');
    }
}
