<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoinsumoIdToAtencionesTable extends Migration
{
    public function up()
    {
        Schema::table('atenciones', function (Blueprint $table) {
            $table->unsignedBigInteger('tipoinsumo_id')->after('id');
            $table->foreign('tipoinsumo_id')->references('id')->on('tipoinsumos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('atenciones', function (Blueprint $table) {
            $table->dropForeign(['tipoinsumo_id']);
            $table->dropColumn('tipoinsumo_id');
        });
    }
}
