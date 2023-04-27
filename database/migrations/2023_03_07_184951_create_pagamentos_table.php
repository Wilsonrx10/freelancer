<?php

use App\Constants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string('id_pagamento_externo');
            $table->unsignedBigInteger('id_produto_externo')->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->string('email')->index();
            $table->unsignedTinyInteger('id_plataforma_pagamento')->default(Constants::PlataformaKiwiFy);
            $table->timestamp('data_inicio')->nullable();
            $table->timestamp('data_fim')->nullable();
            $table->tinyText('status_pagamento');
            $table->tinyText('metodo_pagamento');
            $table->timestamp('data_estorno')->nullable();
            $table->integer('valor_total');
            $table->integer('valor_comissao');
            $table->integer('taxa_adquirente');
            $table->tinyText('parcelas');
            $table->tinyInteger('status')->default(Constants::ativo);
            $table->timestamp('created_at_externo');
            $table->timestamp('updated_at_externo');
            $table->timestamps();
            $table->foreign('id_usuario')
                ->references('id')
                ->on('users');

            $table->unique([
                'id_pagamento_externo',
                'id_plataforma_pagamento'
            ], 'PagamentosExternoPlataformaUnique');

            $table->foreign('id_produto_externo')
                ->references('id')
                ->on('produto_externos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagamentos');
    }
}
