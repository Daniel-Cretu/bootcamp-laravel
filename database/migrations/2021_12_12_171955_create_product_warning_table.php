<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductWarningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_warning', function (Blueprint $table) {
            $table->foreignId('product_id')
                ->references('id')->on('products')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->bigInteger('warning_id')->unsigned()->nullable(false);
            $table->foreign('warning_id')
                ->references('id')->on('warnings')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->unique(['product_id', 'warning_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_warning');
    }
}
