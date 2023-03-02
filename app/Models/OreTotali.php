<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OreTotali extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_utente',
        'ore_totali',
        'ore',
        'minuti'
    ];
}
