<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->unique();
            $table->string('name',64);
            $table->string('email',64)->unique();
            $table->string('user_name',64)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('email_verified')->nullable();
            $table->string('email_verification_token');
            $table->string('password',88);
            $table->string('image',88)->nullable();
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
