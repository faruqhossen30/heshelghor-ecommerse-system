<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_tracks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('merchant_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('orderi_item_id');
            $table->boolean('order_status')->default(false);
            $table->timestamp('accepacct_time')->default(null);
            $table->boolean('cancel_status')->default(false);
            $table->timestamp('cancel_time')->default(null);
            $table->boolean('colect_pointmanager_status')->default(false);
            $table->timestamp('colect_pointmanager_time')->default(null);
            $table->boolean('colect_deliveryman_status')->default(false);
            // $table->timestamp('colect_pointmanager_time')->default(null);
            $table->boolean('vehicle_status')->default(false);
            $table->boolean('delivery_pointmanager_status')->default(false);
            $table->boolean('deliveryman_status')->default(false);
            $table->boolean('user_accept_status')->default(false);
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
        Schema::dropIfExists('order_tracks');
    }
}
