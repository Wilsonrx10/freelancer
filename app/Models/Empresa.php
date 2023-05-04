<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_empresa',
        'cnpj',
        'status'
    ];

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'usuario_empresas', 'empresa_id', 'user_id');
    }
}