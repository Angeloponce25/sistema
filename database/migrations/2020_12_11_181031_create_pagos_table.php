<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cliente_id'); // Relación con etiquetas
            $table->foreign('cliente_id')->references('id')->on('clientes'); // clave foranea
            $table->unsignedBigInteger('mensualidad_id'); // Relación con etiquetas
            $table->foreign('mensualidad_id')->references('id')->on('mensualidads'); // clave foranea
            $table->text('detalle')->nullable();
            $table->unsignedBigInteger('usuario_id'); // Relación con etiquetas
            $table->foreign('usuario_id')->references('id')->on('users'); // clave foranea           
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
        Schema::dropIfExists('pagos');
    }
}
