<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('user_title', 70)->nullable();
            $table->string('user_description', 600)->nullable();
            $table->string('user_image')->nullable();
            $table->string('user_skills')->nullable();
            $table->string('skill_level')->nullable();
            $table->string('user_tags')->nullable();
            $table->string('user_address')->nullable();
            $table->string('user_phone')->nullable();
            $table->string('user_state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('user_timezone')->nullable();
            $table->string('user_additional_info')->nullable();
            $table->string('security_quesion')->nullable();
            $table->string('security_quesion_ans')->nullable();
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
        Schema::dropIfExists('userinfos');
    }
}
