<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('tipagem_sala_id');
            $table->integer('tempo');
            $table->decimal('valor', 17,2);
            $table->timestamps();
            //constraints
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete(('cascade'));
            $table->foreign('tipagem_sala_id')->references('id')->on('tipagem_salas')->onDelete(('cascade'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faturas');
    }
}
