<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')
                ->references('id')->on('orders')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('product_id')->nullable(true)
                ->references('id')->on('products')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->unsignedTinyInteger('quantity')->nullable(false);
            $table->string('phone_number',20);
            $table->string('address',40);
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
        Schema::dropIfExists('order_product');
    }
}