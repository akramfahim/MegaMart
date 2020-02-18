<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->integer('user_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->string('user_profile_name');
            $table->integer('user_profile_rank');
            $table->integer('user_spended')->default('0');
            $table->string('user_profile_number')->nullable();
            $table->integer('status')->default('1');
            $table->string('user_profile_image')->nullable();
            $table->string('user_profile_biography')->nullable();
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
        Schema::dropIfExists('user_profiles');
    }
}
