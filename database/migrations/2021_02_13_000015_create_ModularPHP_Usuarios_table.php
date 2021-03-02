<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateModularPHPUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $nomeTabela = 'ModularPHP@Usuarios';
        Schema::create($nomeTabela, function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("senha");
            $table->unsignedBigInteger("cpf");
            $table->string("matricula")->nullable();
            $table->string("email")->nullable();
            $table->string("telefone1")->nullable();
            $table->string("telefone2")->nullable();
            $table->string("país")->default("Brasil")->nullable();
            $table->string("uf")->default("ES")->nullable();
            $table->string("cidade")->default("Marataízes")->nullable();
            $table->string("localidade")->nullable();
            $table->string("logradouro")->nullable();
            $table->text("referencia_endereco")->nullable();
            $table->string("cep")->nullable();

            $table->text("access_token")->nullable();
            $table->rememberToken();

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
