<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoUnidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tipo_unidades', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('nombre');
            $table->text('descripcion')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('condominio_id');

            $table->foreign('condominio_id')
            ->references('id')
            ->on('condominios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('tipo_unidades');
    }
}
