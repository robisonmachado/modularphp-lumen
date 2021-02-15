<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateModularPHPAcoesDeModuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $nomeTabela = 'ModularPHP@AcoesDeModulo';
        Schema::create($nomeTabela, function (Blueprint $table) {
            $table->id();
            $table->string("rota");

            $table->unsignedBigInteger('modulo_id');
            $table->foreign('modulo_id')->references('id')->on('ModularPHP@Modulos');

            $table->unsignedBigInteger('acao_de_sistema_id');
            $table->foreign('acao_de_sistema_id')->references('id')->on('ModularPHP@AcoesDeSistema');

            $table->boolean('publica')->default(false);



            $table->timestamps();
        });

         // ROTAS DO CONTROLE DE ACESSO
         DB::table($nomeTabela)->insert([
            'modulo_id' => 1,
            'acao_de_sistema_id' => 1,
            'rota' => '/',
            'publica' => true
        ]);

        DB::table($nomeTabela)->insert([
            'modulo_id' => 1,
            'acao_de_sistema_id' => 1,
            'rota' => 'controle-de-acesso',
            'publica' => false
        ]);

        DB::table($nomeTabela)->insert([
            'modulo_id' => 1,
            'acao_de_sistema_id' => 1,
            'rota' => 'controle-de-acesso/acao-modulo-nao-existe',
            'publica' => true
        ]);

        DB::table($nomeTabela)->insert([
            'modulo_id' => 1,
            'acao_de_sistema_id' => 1,
            'rota' => 'controle-de-acesso/usuario-nao-habilitado',
            'publica' => true
        ]);

        DB::table($nomeTabela)->insert([
            'modulo_id' => 1,
            'acao_de_sistema_id' => 1,
            'rota' => 'controle-de-acesso/sanctum/token',
            'publica' => true
        ]);

        DB::table($nomeTabela)->insert([
            'modulo_id' => 1,
            'acao_de_sistema_id' => 2,
            'rota' => 'sanctum/csrf-cookie',
            'publica' => true
        ]);

        DB::table($nomeTabela)->insert([
            'modulo_id' => 1,
            'acao_de_sistema_id' => 1,
            'rota' => 'controle-de-acesso/logout',
            'publica' => true
        ]);




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ModularPHP@AcoesDeModulo', function (Blueprint $table) {
            //
        });
    }
}
