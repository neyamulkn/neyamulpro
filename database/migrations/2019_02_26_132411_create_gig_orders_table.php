<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGigOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gig_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id', 25);
            $table->integer('gig_id');
            $table->string('package_name', 15);
            $table->integer('quantity');
            $table->integer('subtotal');
            $table->integer('total');
            $table->integer('buyer_id');
            $table->integer('seller_id');
            $table->string('payment_method')->nullable();
            $table->string('transection_id')->nullable();
            $table->integer('delivery_time');
            $table->enum('status', ['active', 'deactive', 'pending']);
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
        Schema::dropIfExists('gig_orders');
    }
}
