<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email_aziendale' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email_aziendale', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
        }

        return redirect("/")->withErrors('credenziali errate');
        //return $token;
    }

    public function dashboard()
    {
        //  if (Auth::check()) {
        return view('dashboard');
        //}

        //   return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function getRegisterForm()
    {
        return view('newemployee');
    }

    public function register(RegisterRequest $request)
    {
        if (Auth::user()->ruolo == 'admin') {
            $user = User::create([
                'matricola' => $request['matricola'],
                'ruolo' => $request['ruolo'],
                'nome' => $request['nome'],
                'cognome' => $request['cognome'],
                'luogo_nascita' => $request['luogo_nascita'],
                'data_nascita' => $request['data_nascita'],
                'incarico' => $request['incarico'],
                'indirizzo' => $request['indirizzo'],
                'cap' => $request['cap'],
                'città' => $request['città'],
                'provincia' => $request['provincia'],
                'nazionalità' => $request['nazionalità'],
                'codice_fiscale' => $request['codice_fiscale'],
                'telefono' => $request['telefono'],
                'email_aziendale' => $request['email_aziendale'],
                'email_personale' => $request['email_personale'],
                'banca' => $request['banca'],
                'iban' => $request['iban'],
                'ore_contratto' => $request['ore_contratto'],
                'giorni_ferie_anno' => $request['giorni_ferie_anno'],
                'ore_permesso_annuali' => $request['ore_permesso_annuali'],
                'password' => Hash::make($request['password']),
            ]);

            $role = $request->ruolo;

            $user->assignRole($role);

            // return $user;
            return redirect('panel');
        }
    }

    public function getPanel()
    {
        return view('specmenu');
    }

    public function getUsers()
    {
        $users = User::all();

        $data = [
            'users' => $users,
        ];

        return view('contactsEnames', $data);
    }

    public function logout()
    {
        Auth::logout();
        return Redirect('/');
    }
   
}
