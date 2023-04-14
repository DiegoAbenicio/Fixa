<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joboffers extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'services_id',
        'addresses_id',
        'data',
        'value',
        'description'
    ];
}
