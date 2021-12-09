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
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('pointmanager_id')->default(null);
            $table->integer('commission');
            $table->integer('total_commission');
            $table->boolean('accept_status')->default(false);
            $table->dateTime('accept_time')->nullable();
            $table->boolean('deliveryman_status')->default(false);
            $table->dateTime('deliveryman_accept_time')->nullable();
            $table->unsignedBigInteger('deliveryman_id')->nullable();
            $table->boolean('product_receive_status')->default(false);
            $table->dateTime('product_receive_time')->nullable();
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
