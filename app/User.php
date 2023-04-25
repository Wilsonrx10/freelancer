<?php

namespace App;

use App\Logs\LogUser;
use App\Logs\Model\Log;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Logs\Model\LogModelAuthenticatable;
use App\Logs\LogControl;

class User  extends Authenticatable


{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'telefone', 'id_tipo_usuario', 'remember_token','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
}
