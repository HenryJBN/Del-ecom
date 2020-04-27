<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->unsignedBigInteger('shipping_id')->nullable(true);
            $table->foreign('shipping_id')->references('id')->on('shippings')->onDelete('cascade');
            $table->unsignedBigInteger('billing_id')->nullable(true);
            $table->foreign('billing_id')->references('id')->on('billings')->onDelete('cascade');
            $table->string('email', 40);
            $table->longText('items');
            $table->string('receipt_url', 150)->nullable();
            $table->longText('shipping_info')->nullable();
            $table->longText('billing_info')->nullable();
            $table->enum('status', ['new', 'cancelled', 'shipped', 'delivered', 'returned']);
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
