<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserorderComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userorder_complains', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orderitem_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('complain_number')->nullable();
            $table->dateTime('delivery_date');
            $table->dateTime('delivery_time');
            $table->string('alt_customer_phone');
            $table->string('alt_customer_address');
            $table->string('complain_message');
            $table->string('defect_pic_1');
            $table->string('defect_pic_2');
            $table->string('defect_pic_3')->nullable();
            $table->string('defect_pic_4')->nullable();
            $table->string('defect_pic_5')->nullable();
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
        Schema::dropIfExists('userorder_complains');
    }
}
