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
            $table->integer('total_prodcut');
            $table->integer('total_item');
            $table->integer('product_price');
            $table->integer('delivery_cost');
            $table->integer('total_price');
            $table->string('delivery_system_name');
            $table->string('payment_method_name');
            $table->unsignedBigInteger('delivery_system_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->boolean('status')->default(false);
            $table->boolean('payment')->default(false);
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
