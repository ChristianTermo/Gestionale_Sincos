<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;

    protected $fillable = [     
        'matricola',
        'id_utente',
        'anno',
        'mese',
        'giorno',
        'orario_ingresso_mattina',
        'orario_uscita_mattina',
        'orario_ingresso_pomeriggio',
        'orario_uscita_pomeriggio',
        'straordinario',
        'permesso_da',
        'permesso_a',
        
    ];

    public $timestamps = false;
}
