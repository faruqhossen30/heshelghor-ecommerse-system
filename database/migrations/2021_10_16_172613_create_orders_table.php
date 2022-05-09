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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('invoice_number');
            $table->integer('product_price');
            $table->integer('total_prodcut');
            $table->integer('total_product_price');
            $table->integer('total_item');
            $table->integer('delivery_cost');
            $table->integer('total_delivery_cost');
            // SSL
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('amount');
            $table->string('status');
            $table->string('address');
            $table->string('transaction_id');
            $table->string('currency');
            $table->string('payment_type');
            // Curier
            $table->unsignedBigInteger('courier_id');
            $table->unsignedBigInteger('courier_name');
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
