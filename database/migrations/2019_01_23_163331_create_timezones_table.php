<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimezonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timezones', function (Blueprint $table) {
            $table->increments('TimeZone_idPrimary');
             $table->string('CountryCode', 2);
             $table->string('Coordinates', 15);
             $table->string('TimeZone', 32);
             $table->string('Comments', 85);
             $table->string('UTC_offset', 8);
             $table->string('UTC_DST_offset', 8);
             $table->string('Notes', 80);
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
        Schema::dropIfExists('timezones');
    }
}
