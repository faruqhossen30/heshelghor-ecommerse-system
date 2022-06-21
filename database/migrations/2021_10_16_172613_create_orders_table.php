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
            $table->integer('total_item');
            $table->integer('total_prodcut');
            $table->integer('total_product_price');
            $table->integer('total_delivery_cost');
            $table->string('payment_type');
            // SSL
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('amount');
            $table->string('status');
            $table->boolean('user_cancel_status')->default(false);
            $table->boolean('complete_status')->default(false);
            $table->string('address');
            $table->string('transaction_id');
            $table->string('currency')->default('BDT');
            $table->string('note',1000)->nullable();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('upazila_id')->nullable();
            $table->dateTime('user_canceled_at')->nullable()->default(null);
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
