<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_utente',
        'data',
        'ore_ingresso_mattina',
        'ore_uscita_mattina',
        'ore_ingresso_pomeriggio',
        'ore_uscita_pomeriggio',
        'minuti_ingresso_mattina',
        'minuti_uscita_mattina',
        'minuti_ingresso_pomeriggio',
        'minuti_uscita_pomeriggio',
        'ore_totali'
    ];
}
