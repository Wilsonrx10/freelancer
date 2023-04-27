<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoTelegramCanais extends Model
{
    protected $fillable = ['id_produto','id_telegram_canal','nome_telegram_canal','canal_admin','status','updated_at','convite'];
}
