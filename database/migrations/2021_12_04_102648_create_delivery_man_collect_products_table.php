<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryManCollectProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_man_collect_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('invoice_id');
            $table->unsignedBigInteger('orderitem_id');
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('pointmanager_id')->default(null);
            $table->unsignedBigInteger('pmcp_id');
            $table->float('commission');
            $table->float('total_commission');
            $table->boolean('accept_status')->default(false);
            $table->dateTime('accept_time')->nullable();
            $table->unsignedBigInteger('deliveryman_id')->default(null);
            $table->boolean('pointmanager_receive_status')->default(false);
            $table->dateTime('pointmanager_receive_time')->nullable();
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
        Schema::dropIfExists('delivery_man_collect_products');
    }
}
