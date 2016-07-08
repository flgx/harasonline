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
            $table->string('nombre');
            $table->integer('external_id');
            $table->primary('external_id');
            
            $table->integer('edad');        
            $table->text('descripcion');        
            $table->text('categoria');
            $table->text('padre');
            $table->text('madre');
            $table->text('ubicacion');
            $table->string('sexo');

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
