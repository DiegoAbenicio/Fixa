<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicescaught extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'services_id',
        'workers_id',
        'address_id',
        'data',
        'value',
        'description'
    ];
}
