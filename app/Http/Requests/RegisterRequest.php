<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'matricola'=>'required|unique:users,matricola',
            'ruolo'=>'required|exists:roles,name',
            'email_personale'=>'required|email|unique:users,email_personale',
            'email_aziendale'=>'required|email|unique:users,email_aziendale',
            'nome'=>'required',
            'cognome'=>'required',
            'password'=>'required',
            'data_nascita'=>'required|date',
            'luogo_nascita'=>'required',
            'incarico'=>'required',
            'indirizzo'=>'required',
            'cap'=>'required',
            'città'=>'required',
            'provincia'=>'required',
            'indirizzo'=>'required',
            'banca'=>'required',
            'iban'=>'required',
            'codice_fiscale'=>'required|unique:users',
            'ore_contratto'=>'required',
            'giorni_ferie_anno'=>'required',
            'ore_permesso_annuali'=>'required',
            'nazionalità'=>'required',
            'telefono'=> 'required|unique:users,telefono',
        ];
    }
}
