<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemeOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->char('order_id', 255);
            $table->integer('theme_id');
            $table->char('lichance_name', 15);
            $table->integer('seller_id');
            $table->integer('buyer_id');
            $table->char('ref_user', 25)->nullable();
            $table->double('total_price', 8,2);
            $table->char('payment_method', 25);
            $table->char('transection_id', 50);
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
        Schema::dropIfExists('theme_orders');
    }
}
