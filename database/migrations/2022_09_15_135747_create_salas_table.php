<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('predio_id');      
            $table->string('nome', 100);
            $table->text('fotos');
            $table->text('descricao');
            $table->timestamps();
            //constraint
            $table->foreign('predio_id')->references('id')->on('predios')->onDelete(('cascade'));      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salas');
    }
}
