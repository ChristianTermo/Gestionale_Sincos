<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditDataController extends Controller
{
    public function index(User $user)
    {
        $data = [
            "user" => $user
        ];

        return view('editMyData', $data);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nome' => 'required',
            'cognome' => 'required',
            'telefono' => 'required|unique:users,telefono',
            'email_personale' => 'required|email|unique:users,email_personale',
            'indirizzo' => 'required',
            'cap' => 'required',
            'città' => 'required',
            'provincia' => 'required',
            'banca' => 'required',
            'iban' => 'required',
        ]);

        $user->nome = $request->input('nome');
        $user->cognome = $request->input('cognome');
        $user->email_personale = $request->input('email_personale');
        $user->telefono = $request->input('telefono');
        $user->indirizzo = $request->input('indirizzo');
        $user->cap = $request->input('cap');
        $user->città = $request->input('città');
        $user->provincia = $request->input('provincia');
        $user->banca = $request->input('banca');
        $user->iban = $request->input('iban');
        $user->save();

        return redirect('panel');
    }

    public function changePassword()
    {
        return view('changePassword');
    }

    public function submitNewPassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        User::where('id', '=', Auth::user()->id)->update([
            'password' => $request['password']
        ]);

        return redirect('changePassword')->withErrors('password aggiornata');
    }
}
