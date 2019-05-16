<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGigStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gig_statuses', function (Blueprint $table) {
            $table->increments('stutus_id');
            $table->tinyinteger('gig_id');
            $table->tinyinteger('buyer_id');
            $table->tinyinteger('seller_id');
            $table->tinyinteger('priority')->nullable();
            $table->tinyinteger('new')->nullable();
            $table->tinyinteger('active')->nullable();
            $table->tinyinteger('delivered')->nullable();
            $table->tinyinteger('complated')->nullable();
            $table->tinyinteger('cancel')->nullable();
            $table->tinyinteger('started')->nullable();
            $table->tinyinteger('missing')->nullable();
            $table->tinyinteger('waiting')->nullable();
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
        Schema::dropIfExists('gig_statuses');
    }
}
