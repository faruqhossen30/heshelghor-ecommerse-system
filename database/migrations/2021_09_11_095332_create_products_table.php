<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            // info
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->longText('short_description');
            $table->string('slug');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('subcatagory_id');
            $table->integer('marchant_id');
            $table->integer('shop_id');
            // price
            $table->double('regular_price');
            $table->double('sale_price');
            $table->double('offer_price');
            $table->double('price');
            $table->double('quantity');
            $table->double('quantity_alert');
            $table->double('review')->nullable();
            $table->string('puk_code');
            $table->string('image');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('products');
    }
}
