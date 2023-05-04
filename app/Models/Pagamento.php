<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model

{
    protected $fillable = ["data_inicio", "data_fim", "id_usuario", "id_pagamento_externo", "status_pagamento", "status", "metodo_pagamento", "data_estorno", "valor_total", "valor_comissao", "taxa_adquirente", "parcelas", "updated_at","updated_at_externo","created_at_externo","id_produto_externo","email","id_plataforma_pagamento"];

    public function getNeedsAuth(): bool
    {
        return false;
    }
}
