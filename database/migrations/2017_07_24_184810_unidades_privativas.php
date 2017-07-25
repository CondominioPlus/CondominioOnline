<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UnidadesPrivativas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('unidades', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('numero');
            $table->boolean('rentado')->default(0);
            $table->integer('numero_cajones')->nullable();
            $table->text('notas')->nullable();
            $table->unsignedBigInteger('tipo_unidades_id')->nullable();
            $table->unsignedBigInteger('condominio_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tipo_unidades_id')
            ->references('id')
            ->on('tipo_unidades');

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
        Schema::dropIfExists('unidades');
    }
}
