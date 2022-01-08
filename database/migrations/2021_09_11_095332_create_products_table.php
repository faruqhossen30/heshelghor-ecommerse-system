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
            $table->string('slug')->unique();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('subsub_category_id')->nullable();
            $table->unsignedBigInteger('brand_id');
            $table->string('author');
            $table->unsignedBigInteger('author_id');
            $table->integer('shop_id');
            // price
            $table->integer('regular_price');
            $table->integer('discount')->nullable();
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('quantity_alert');
            $table->double('review')->nullable();
            $table->string('puk_code')->nullable();
            $table->string('photo');
            $table->boolean('status')->default(true);
            // Photo
            $table->string('img_full');
            $table->string('img_small');
            $table->string('img_medium');
            $table->string('img_large');

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
