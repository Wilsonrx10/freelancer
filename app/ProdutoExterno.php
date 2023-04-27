<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoExterno extends Model
{
    protected $fillable = ['id_produto_externo', 'nome_produto_externo', 'id_produto' ,'status', 'updated_at'];
}
