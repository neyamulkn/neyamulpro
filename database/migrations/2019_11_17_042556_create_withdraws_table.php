<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->double('amount', 8,2);
            $table->char('payment_type', 25);
            $table->char('account_no', 25)->nullable();
            $table->char('transaction_id', 75)->nullable();
            $table->char('bank_account', 75)->nullable();
            $table->char('bank_info', 75)->nullable();
            $table->char('note', 255)->nullable();
            $table->char('status', 10)->default('pending');
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
        Schema::dropIfExists('withdraws');
    }
}
