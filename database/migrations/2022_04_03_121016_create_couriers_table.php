<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->integer('price');
            $table->unsignedBigInteger('author_id');
            $table->boolean('status')->default(true);
            $table->integer('dhaka_to_dhaka_price')->default(0);
            $table->integer('all_place_price')->default(0);
            $table->integer('dhaka_to_dhaka_per_kg')->default(0);
            $table->integer('dhaka_to_outside_per_kg')->default(0);
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
        Schema::dropIfExists('couriers');
    }
}
