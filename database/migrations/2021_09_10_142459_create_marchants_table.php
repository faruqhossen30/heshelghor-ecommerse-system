<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marchants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_number');
            $table->string('address');
            $table->rememberToken();
            $table->string('android_token')->nullable();
            $table->string('photo')->nullable();
            $table->string('nid_no')->nullable();
            $table->string('tradelicense_no')->nullable();
            $table->string('tin_no')->nullable();
            $table->string('nid_photo')->nullable();
            $table->string('tradelicense_photo')->nullable();
            $table->string('tin_photo')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('marchants');
    }
}
