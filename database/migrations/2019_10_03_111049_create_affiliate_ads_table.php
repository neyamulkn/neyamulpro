<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_ads', function (Blueprint $table) {
            $table->increments('ads_id');
            $table->string('ref_username', 25);
            $table->string('platform_type', 15)->nullable();
            $table->integer('view_product')->nullable();
            $table->integer('column')->nullable();
            $table->string('popup',5)->nullable();
            $table->integer('total_view')->default(0);
            $table->integer('total_sale')->default(0);
            $table->double('ref_earning',8,2)->default(0);
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
        Schema::dropIfExists('affiliate_ads');
    }
}
