<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_info', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
                ->constrained('products','id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->tinyText('description')->nullable(true);
            $table->tinyText('image_location')->nullable(true);
            $table->string('name',40)->nullable(false);
            $table->decimal('price',10,2)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_info');
    }
}
