<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transaction_ref', 100);
            $table->string('channel');
            $table->double('amount');
            $table->string('payment_status', 100);
            $table->string('name', 150);
            $table->string('email_address', 40);
            $table->string('phone_number', 15);
            $table->string('currency', 100);
            $table->string('merchant_transaction_ref', 12);
            $table->string('payment_status_description', 255);
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
        Schema::dropIfExists('transactions');
    }
}
