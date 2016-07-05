<?php

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
            $table->increments('id',11);
            $table->string('name',45);
            $table->string('last_name',45);
            $table->string('email',45)->unique();
            $table->string('user',16)->unique();
            $table->string('password',35)->unique();
            $table->string('remember_token',100);
            $table->boolean('isactive');
            $table->string('fnacimient',10);
            $table->string('comfirm_token',255);
            $table->rememberToken();
            $table->timestamps();
            $table->integer('positions_id')->unsigned();
            $table->foreign('positions_id')->references('id')->on('positions');
            $table->integer('is_admin')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
