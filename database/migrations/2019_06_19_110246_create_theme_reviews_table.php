<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemeReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_reviews', function (Blueprint $table) {
            $table->increments('review_id');
            $table->integer('theme_id');
            $table->integer('buyer_id');
            $table->integer('ratting_star');
            $table->char('ratting_reason',255);
            $table->text('ratting_comment')->nullable();
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
        Schema::dropIfExists('theme_reviews');
    }
}
