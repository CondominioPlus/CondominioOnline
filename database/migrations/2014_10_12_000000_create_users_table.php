<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rol_id')->default('1');
            $table->text('nombre');
            $table->text('apellido');
            $table->string('email')->unique();
            $table->string('telefono');
            $table->text('contraseña');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            
            $table->foreign('rol_id')
            ->references('id')
            ->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
