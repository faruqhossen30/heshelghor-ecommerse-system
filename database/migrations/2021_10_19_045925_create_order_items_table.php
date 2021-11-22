<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('merchant_id');
            $table->unsignedBigInteger('order_id');
            $table->string('order_number');
            $table->unsignedBigInteger('product_id');
            $table->double('regular_price');
            $table->double('discount');
            $table->double('price');
            $table->integer('quantity');
            $table->double('merchant_price');
            $table->double('merchant_price_total');
            $table->double('delivery_cost');
            $table->double('total_delivery_cost');
            $table->string('color');
            $table->string('size');
            $table->string('delivery_system_name');
            $table->string('payment_method_name');
            $table->boolean('order_status')->default(false);
            $table->boolean('cancel_status')->default(false);
            $table->boolean('colect_pointmanager_status')->default(false);
            $table->boolean('colect_deliveryman_status')->default(false);
            $table->boolean('vehicle_status')->default(false);
            $table->boolean('delivery_pointmanager_status')->default(false);
            $table->boolean('deliveryman_status')->default(false);
            $table->boolean('user_accept_status')->default(false);
            $table->string('order_pin_no');
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
        Schema::dropIfExists('order_items');
    }
}
