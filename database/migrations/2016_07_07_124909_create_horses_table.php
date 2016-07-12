<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');            
            $table->integer('edad');        
            $table->text('descripcion');
            $table->text('padre');
            $table->text('madre');
            $table->text('ubicacion');
            $table->string('sexo');
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('horses');
    }
}
