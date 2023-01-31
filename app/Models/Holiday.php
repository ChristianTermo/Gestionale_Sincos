<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;

    protected $fillable = [
        'ferie_da',
        'ferie_a',
        'giorno_richiesta',
        'nome',
        'cognome',
        'note',
        'user_id',
    ];


}
