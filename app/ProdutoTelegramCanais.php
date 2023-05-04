<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoTelegramCanais extends Model
{
    protected $fillable = ['id_produto','code_telegram_canal','nome_telegram_canal','canal_admin','status','updated_at','convite'];

    protected $with = ['produto'];
    
    public function produto() {
        return $this->belongsTo(Produto::class,'id_produto');
    }
}
