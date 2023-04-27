<?php

use App\Constants;
use App\Http\Controllers\ProdutoController;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('nome_produto');
            $table->string('descricao')->nullable();
            $table->tinyText('icone')->nullable();
            $table->tinyInteger('status')->default(Constants::ativo);
            $table->tinyInteger('modo_analise')->default(Constants::inativo);
            $table->timestamps();
        });
        Schema::create('produto_externos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo_produto_externo');
            $table->string('nome_produto_externo');
            $table->tinyInteger('id_produto')->nullable()->unsigned();
            $table->tinyInteger('status')->default(Constants::ativo);
            $table->timestamps();

            $table->foreign('id_produto')
                ->references('id')->on('produtos');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_externos');
        Schema::dropIfExists('produtos');
    }
}
