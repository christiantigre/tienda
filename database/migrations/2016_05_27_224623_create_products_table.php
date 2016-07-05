<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('nombre',25);
            $table->string('slug',25);
            $table->string('codbarra',15);
            $table->string('cant',5);
            $table->double('pre_com',8,2);
            $table->double('pre_ven',8,2);
            $table->string('img',300);
            $table->string('prgr_tittle',300);
            $table->boolean('nuevo',1);
            $table->boolean('promocion',1);
            $table->boolean('catalogo',1);
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands');
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
        Schema::drop('products');
    }
}
