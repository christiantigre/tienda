<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Proveedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_compania',45);
            $table->string('ruc',15)->unique();
            $table->string('telefono',15);
            $table->string('celular',15);
            $table->string('fax',25);
            $table->string('fecharegistro',45);
            $table->string('direccion',85);
            $table->string('codigopostal',10);
            $table->string('email',45)->unique();
            $table->string('pagweb',85);
            $table->string('observacion',255);
            $table->string('logo',255);
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->integer('prov_id')->unsigned();
            $table->foreign('prov_id')->references('id')->on('provinces');
            $table->integer('isactive_id')->unsigned();
            $table->foreign('isactive_id')->references('id')->on('isactives');
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
        Schema::drop('proveedors');
    }
}
