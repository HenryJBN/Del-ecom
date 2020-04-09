<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable(true);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('category_id')->nullable(true);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('sku', 10);
            $table->string('name', 190)->unique();
            $table->string('slug', 200);
            $table->text('description');
            $table->double('price');
            $table->unsignedInteger('quantity');
            $table->double('weight')->nullable();
            $table->enum('status', ['']);
            $table->string('color', 100);
            $table->unsignedInteger('size')->nullable('true');
            $table->string('model')->nullable();
            $table->string('brand')->nullable();
            $table->unsignedBigInteger('media_id');
            $table->string('feature_image', 150);
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
        Schema::dropIfExists('products');
    }
}
