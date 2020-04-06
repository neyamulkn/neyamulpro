<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGigBasicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gig_basics', function (Blueprint $table) {
            $table->increments('gig_id');
            $table->string('gig_title');
            $table->string('gig_url');
            $table->longText('gig_dsc', 1200)->nullable();
            $table->string('category_name');
            $table->string('gig_subcategory')->nullable();
            $table->string('gig_metadata')->nullable();
            $table->string('gig_payment_type', 10);
            $table->string('gig_search_tag');
            $table->integer('gig_user_id');
            $table->integer('gig_impress')->nullable()->default(0);
            $table->integer('gig_click')->nullable()->default(0);
            $table->integer('gig_view')->nullable()->default(0);
            $table->string('gig_status');
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
        Schema::dropIfExists('gig_basics');
    }
}
