<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipagemSalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipagem_salas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sala_id');
            $table->unsignedBigInteger('tipo_sala_id');
            $table->decimal('preco', 17,2);
            $table->timestamps();
            //constraints
            $table->foreign('sala_id')->references('id')->on('salas')->onDelete(('cascade'));
            $table->foreign('tipo_sala_id')->references('id')->on('tipo_salas')->onDelete(('cascade'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipagem_salas');
    }
}
