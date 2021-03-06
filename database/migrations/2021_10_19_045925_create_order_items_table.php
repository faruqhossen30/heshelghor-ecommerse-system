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
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('merchant_id');
            $table->unsignedBigInteger('shop_id');
            $table->string('order_number');
            //Price
            $table->integer('quantity');
            $table->integer('price');
            $table->string('discount_type');
            $table->integer('discount');
            $table->string('varient')->nullable();
            // Delivery
            $table->unsignedBigInteger('courier_id');
            $table->string('courier_packege_desc');
            $table->integer('delivery_cost');
            $table->integer('total_delivery_cost');
            // Status
            $table->boolean('accept_status')->default(false);
            $table->boolean('cancel_status')->default(false);
            $table->boolean('courier_status')->default(false);
            $table->boolean('complete_status')->default(false);
            $table->string('author')->default('merchant');
            $table->unsignedBigInteger('admin_id')->nullable()->default(null);
            $table->unsignedBigInteger('courier_authorid')->nullable()->default(null);
            $table->unsignedBigInteger('complete_authorid')->nullable()->default(null);

            $table->string('order_pin_no');
            $table->boolean('status')->default(true);
            $table->dateTime('accepted_at')->nullable()->default(null);
            $table->dateTime('canceled_at')->nullable()->default(null);
            $table->dateTime('couriered_at')->nullable()->default(null);
            $table->dateTime('completed_at')->nullable()->default(null);
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
