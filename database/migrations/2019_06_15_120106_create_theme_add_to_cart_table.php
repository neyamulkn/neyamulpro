<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemeAddToCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_add_to_cart', function (Blueprint $table) {
            $table->increments('cart_id');
            $table->integer('theme_id');
            $table->char('lichance_name', 20);
            $table->float('price', 8, 2);
            $table->integer('user_id')->nullable();
            $table->char('session_id', 255)->nullable();
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
        Schema::dropIfExists('theme_add_to_cart');
    }
}
