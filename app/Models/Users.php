<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    // Define as colunas que podem ser preenchidas em massa
    protected $fillable = [
        'name',
        'email',
        'password',
        'number'
    ];

    // Define as colunas que não podem ser atribuídas em massa
    protected $guarded = [
        'id'
    ];

    // Define a coluna que deve ser usada para autenticação
    public function getAuthIdentifierName()
    {
        return 'email';
    }
}
