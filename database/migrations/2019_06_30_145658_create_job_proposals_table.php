<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_proposals', function (Blueprint $table) {
            $table->increments('proposal_id');
            $table->integer('job_id');
            $table->integer('buyer_id');
            $table->integer('freelancer_id');
            $table->double('proposal_budget', 8,2);
            $table->char('work_duration', 15);
            $table->text('proposal_dsc');
            $table->char('proposal_file', 255)->nullable();
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
        Schema::dropIfExists('job_proposals');
    }
}
