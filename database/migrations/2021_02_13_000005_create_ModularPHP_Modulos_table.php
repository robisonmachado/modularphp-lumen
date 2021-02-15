<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateModularPHPModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ModularPHP@Modulos', function (Blueprint $table) {
            $table->id();

            $table->string("nome");

            $table->string('prefixo_de_rota');

            $table->unsignedBigInteger('modulo_pai')->nullable(1);
            $table->foreign('modulo_pai')->references('id')->on('ModularPHP@Modulos');


            $table->text('dependencias')->nullable();
            $table->text('descricao')->nullable();

            $table->timestamps();
        });

        DB::table("ModularPHP@Modulos")->insert([
            'id' => 1,
            'nome' => 'ModularPHP',
            'prefixo_de_rota' => '/',
            'modulo_pai' => null,
            'descricao' => 'MÓDULO RAIZ DO SISTEMA',

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ModularPHP@Modulos', function (Blueprint $table) {
            //
        });
    }
}
