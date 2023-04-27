<?php

use App\Constants;
use App\Produto;
use App\ProdutoExterno;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Registros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Produto::create([
            "id" => 1,
            'nome_produto' => "Produto",
            'status' => Constants::ativo
        ]);
        ProdutoExterno::create([
            'codigo_produto_externo' => "32132asdasd1233dsa--asd",
            'nome_produto_externo' => "ProdutoExterno",
            'id_produto' => 1,
            'status' => Constants::ativo
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
