<?php

use App\Constants;
use App\ProdutoTelegramCanais;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoTelegramCanaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_telegram_canais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('id_produto');
            $table->string('id_telegram_canal');
            $table->string('nome_telegram_canal');
            $table->string('convite')->nullable();
            $table->tinyInteger('canal_admin')->default(Constants::inativo);
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
        Schema::dropIfExists('produto_telegram_canais');
    }
}
