<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('order_code')->unique();
            $table->string('shipment_id')->unique()->nullable();
            $table->string('email', 40);
            $table->longText('items');
            $table->string('receipt_url', 150)->nullable();
            $table->longText('shipping_info')->nullable();
            $table->enum('status', ['new', 'canceled', 'shipped', 'delivered', 'returned']);
            $table->unsignedInteger('quantity');
            $table->double('subtotal');
            $table->double('total');
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
        Schema::dropIfExists('orders');
    }
}
