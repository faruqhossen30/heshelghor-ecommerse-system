<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsercomplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usercomplains', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id');
            $table->string('complain_number');
            $table->integer('order_number');
            $table->dateTime('delivery_date');
            $table->dateTime('delivery_time');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->integer('customer_mobile');
            $table->string('customer_address');
            $table->string('alt_customer_name');
            $table->integer('alt_customer_phone');
            $table->string('alt_customer_email');
            $table->string('alt_customer_address');
            $table->string('complain_message');
            $table->string('defect_pic_1');
            $table->string('defect_pic_2');
            $table->string('defect_pic_3');
            $table->string('defect_pic_4');
            $table->string('defect_pic_5');
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
        Schema::dropIfExists('usercomplains');
    }
}
