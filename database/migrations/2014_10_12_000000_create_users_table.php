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
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->rememberToken();
            $table->date('created_at');
            $table->date('updated_at');
            $table->date('deleted_at');
        });

        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->reference('id')->on('user');
            $table->boolean('active');
            $table->string('title');
            $table->string('body');
            $table->date('published_at');
            $table->date('created_at');
            $table->date('updated_at');
            $table->date('deleted_at');
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
        Schema::dropIfExists('post');
    }
}
