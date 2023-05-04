<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioEmpresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'empresa_id',
        'status'
    ];

   public function produto()
   {
     return $this->belongsTo(Produto::class,'id_produto');
   }

}