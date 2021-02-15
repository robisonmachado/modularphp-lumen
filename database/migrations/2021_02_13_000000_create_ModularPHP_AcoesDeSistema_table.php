<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateModularPHPAcoesDeSistemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $nomeTabela = 'ModularPHP@AcoesDeSistema';
        Schema::create($nomeTabela, function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->text('descricao')->nullable();

            $table->timestamps();
        });


        DB::table($nomeTabela)->insert([
            'id' => 1,
            'nome' => 'criar',
        ]);

        DB::table($nomeTabela)->insert([
            'id' => 2,
            'nome' => 'ler',
        ]);

        DB::table($nomeTabela)->insert([
            'id' => 3,
            'nome' => 'modificar',
        ]);

        DB::table($nomeTabela)->insert([
            'id' => 4,
            'nome' => 'excluir',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ModularPHP@AcoesDeSistema', function (Blueprint $table) {
            //
        });
    }
}
