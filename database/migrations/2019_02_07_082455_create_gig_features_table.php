<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGigFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gig_features', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gig_id');
            $table->integer('user_id');
            $table->integer('feature_id');
            $table->string('feature_name');
            $table->string('feature_basic')->nullable()->default('No');
            $table->string('feature_plus')->nullable()->default('No');
            $table->string('feature_super')->nullable()->default('No');
            $table->string('feature_platinum')->nullable()->default('No');
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
        Schema::dropIfExists('gig_features');
    }
}
