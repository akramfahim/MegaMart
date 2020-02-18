<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->integer('supplier_id')->nullable();
            $table->string('item_name');
            $table->integer('item_type');
            $table->integer('item_category');
            $table->integer('item_stock');
            $table->string('item_amount')->nullable();
            $table->string('item_image')->nullable();
            $table->integer('item_price')->nullable();
            $table->integer('item_discount')->nullable();
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
        Schema::dropIfExists('items');
    }
}
