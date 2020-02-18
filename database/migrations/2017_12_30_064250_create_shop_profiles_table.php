<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->string('shop_name');
            $table->string('shop_domain')->unique();
            $table->integer('shop_category');
            $table->string('shop_number')->nullable();
            $table->string('shop_info')->nullable();
            $table->string('shop_location')->nullable();
            $table->string('shop_email')->nullable();
            $table->string('shop_logo')->nullable();
            $table->integer('status')->default('1');
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
        Schema::dropIfExists('shop_profiles');
    }
}
