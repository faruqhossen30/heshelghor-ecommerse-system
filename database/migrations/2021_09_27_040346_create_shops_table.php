<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description', 1000)->nullable();
            $table->string('address', 1000);
            $table->string('mobile')->nullable();
            $table->string('slug')->unique();
            $table->string('trade_license')->nullable();
            $table->string('image', 1000)->nullable();
            $table->unsignedBigInteger('market_id')->nullable();
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('upazila_id');
            $table->string('author');
            $table->unsignedBigInteger('author_id');
            $table->string('img_full')->nullable();
            $table->string('img_small')->nullable();
            $table->string('img_medium')->nullable();
            $table->string('img_large')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('vacation')->default(false);
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
        Schema::dropIfExists('shops');
    }
}
