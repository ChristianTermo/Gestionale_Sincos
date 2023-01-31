<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HolidayController extends Controller
{

    public function getRichiestaFerie()
    {
        return view('richiestaFerie');
    }

    public function requireHoliday(Request $request)
    {
        $request->validate([
            'ferie_da' => ['required', 'date'],
            'ferie_a' => ['required', 'date'],
            'note' => []
        ]);

        Holiday::create(
            [
                'ferie_da' => $request['ferie_da'],
                'ferie_a' => $request['ferie_a'],
                'nome' => Auth::user()->nome,
                'cognome' => Auth::user()->cognome,
                'giorno_richiesta' => Carbon::now()->format('Y-m-d'),
                'note' => $request['note'],
                'user_id' => Auth::user()->id,
            ]
        );

        return redirect('panel');
    }

    public function getHolidayRequest()
    {
        $holidays =  Holiday::all()->where('accepted', '=', null);

        $data = [
            "holidays" => $holidays
        ];

        return view('visualFerie', $data);
    }

    public function acceptHoliday(Request $request)
    {
        $request->validate([
            'accepted' => ['required'],
            'note' => ['max:50']
        ]);

        $accepted = $request['accepted'];

        if ($accepted == true) {
            DB::table('holidays')
                ->update(
                    [
                        'accepted' => true,
                        'note' => $request['note'],
                    ]
                );
        } else {
            DB::table('holidays')
                ->update(
                    [
                        'accepted' => false,
                        'note' => $request['note'],
                    ]
                );
        }
        return redirect('panel');
    }

    public function getHoliday()
    {
        $holidaysList =  Holiday::all()->where('user_id', '=', Auth::user()->id);

        $data = [
            "holidaysList" => $holidaysList
        ];

        return view('myFerie', $data);
    }
}
