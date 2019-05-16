<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGigPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gig_prices', function (Blueprint $table) {
            $table->increments('pirce_id');
            $table->integer('gig_id');
            $table->integer('catetory_id');
            $table->string('basic_title');
            $table->string('plus_title');
            $table->string('super_title');
            $table->string('platinum_title');
            $table->string('basic_dsc');
            $table->string('plus_dsc');
            $table->string('super_dsc');
            $table->string('platinum_dsc');
            $table->string('delivery_time_b');
            $table->string('delivery_time_p');
            $table->string('delivery_time_s');
            $table->string('delivery_time_pm');
            $table->string('rivision_b');
            $table->string('rivision_p');
            $table->string('rivision_s');
            $table->string('rivision_pm');
            $table->string('daily_work_b', 15)->nullable();
            $table->string('daily_work_p', 15)->nullable();
            $table->string('daily_work_s', 15)->nullable();
            $table->string('daily_work_pm', 15)->nullable();
            $table->double('basic_p', 8, 2);
            $table->double('plus_p', 8, 2);
            $table->double('super_p', 8, 2);
            $table->double('platinum_p', 8, 2);
            $table->integer('user_id');
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
        Schema::dropIfExists('gig_prices');
    }
}
