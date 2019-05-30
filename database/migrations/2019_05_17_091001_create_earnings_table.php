<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEarningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earnings', function (Blueprint $table) {
            $table->increments('earning_id');
            $table->integer('seller_id');
            $table->integer('buyer_id');
            $table->integer('item_id');
            $table->integer('price');
            $table->double('earning', 8, 2)->nullable();
            $table->char('type', 25)->nullable();
            $table->char('ref_username', 25)->nullable();
            $table->double('ref_earning', 8, 2)->nullable();
            $table->char('status',15);
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
        Schema::dropIfExists('earnings');
    }
}
