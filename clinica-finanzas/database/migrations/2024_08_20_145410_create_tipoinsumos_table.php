<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoinsumosTable extends Migration
{
    public function up()
    {
        Schema::create('tipoinsumos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_insumo');
            $table->integer('costo_insumo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipoinsumos');
    }
}
