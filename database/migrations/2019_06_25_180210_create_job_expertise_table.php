<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobExpertiseTable extends Migration
{

    public function up()
    {
        Schema::create('job_expertise', function (Blueprint $table) {
            $table->increments('exp_id');
            $table->integer('job_id');
            $table->integer('filter_id');
            $table->integer('subfilter_id');
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
        Schema::dropIfExists('job_expertise');
    }
}
