<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('profesionales', function (Blueprint $table) {
            $table->integer('precio_atencion_profesional')->default(0);
        });
    }
         
    public function down()
    {
        Schema::table('profesionales', function (Blueprint $table) { 
            $table->dropColumn('precio_atencion_profesional');
        });
    }
};
