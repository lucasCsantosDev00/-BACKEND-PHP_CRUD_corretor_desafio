<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corretor extends Model
{
    use HasFactory;

    protected $table = 'corretores';

    protected $fillable = [
        'name',
        'cpf',
        'creci'
    ];
}
