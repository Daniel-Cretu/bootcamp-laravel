<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductToppingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product_topping', function (Blueprint $table) {
            $table->foreignId('order_product_id')
                ->references('id')->on('order_product')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->bigInteger('product_id')->unsigned()->nullable(true);
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->unsignedTinyInteger('quantity')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product_topping');
    }
}
