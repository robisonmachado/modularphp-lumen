<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModularPHPUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ModularPHP@Usuarios', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("senha");
            $table->string("cpf");
            $table->string("matricula")->nullable();
            $table->string("telefone1")->nullable();
            $table->string("telefone2")->nullable();
            $table->string("país")->default("Brasil")->nullable();
            $table->string("uf")->default("ES")->nullable();
            $table->string("cidade")->default("Marataízes")->nullable();
            $table->string("localidade")->nullable();
            $table->string("logradouro")->nullable();

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
        Schema::dropIfExists('ModularPHP@Usuarios');
    }
}
