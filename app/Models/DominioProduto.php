<?php

namespace App\Models;

use App\Produto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DominioProduto extends Model
{
    use HasFactory;

    protected $with = ['produto'];

    protected $fillable = [
        'id_produto',
        'url',
        'status'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class,'id_produto');
    }
}