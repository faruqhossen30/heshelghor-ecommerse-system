<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointManagerCollectProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_manager_collect_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('invoice_id');
            $table->unsignedBigInteger('orderitem_id');
            $table->integer('commission');
            $table->integer('total_commission');
            $table->string('mobile');
            $table->string('address');
            $table->dateTime('order_place');
            $table->dateTime('order_accept');
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
        Schema::dropIfExists('point_manager_collect_products');
    }
}
