<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveCostoInsumosFromAtenciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('atenciones', function (Blueprint $table) {
            $table->dropColumn('costo_insumos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('atenciones', function (Blueprint $table) {
            $table->decimal('costo_insumos', 8, 2)->nullable();
        });
    }
}
