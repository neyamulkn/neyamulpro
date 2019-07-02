<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('job_id');
            $table->char('job_title', 255);
            $table->char('job_title_slug', 255);
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->text('job_dsc')->nullable();
            $table->char('project_type', 15)->nullable();
            $table->integer('number_freelancer')->nullable();
            $table->char('experience', 15)->nullable();
            $table->char('price_type', 15)->nullable();
            $table->double('budget', 8, 2)->nullable();
            $table->char('status',10)->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
