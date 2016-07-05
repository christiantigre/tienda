<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres',45);
            $table->string('apellidos',45);
            $table->string('fechanacimiento',10);
            $table->string('genero',9);
            $table->string('cedula',10);
            $table->integer('cargo_id')->unsigned();
            $table->foreign('cargo_id')->references('id')->on('positions');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->integer('province_id')->unsigned();
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->integer('isactive_id')->unsigned();
            $table->foreign('isactive_id')->references('id')->on('isactives');
            $table->string('telefono',15);
            $table->string('celular',15);
            $table->string('email',45)->unique();
            $table->string('img',255);
            $table->string('dir',200);
            $table->string('estcivil',12);
            $table->double('sld',15,2);
            $table->string('username',16)->unique();
            $table->string('password',35)->unique();
            $table->string('remember_token',45);
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
        Schema::drop('emps');
    }
}
