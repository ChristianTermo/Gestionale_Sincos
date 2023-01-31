<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TimesheetController extends Controller
{
    public function setTimesheet()
    {
        $orario_ingresso_mattina = DB::table('timesheets')
            ->where('data',  '=', Carbon::now()
                ->format('Y-m-d'))
                ->where('id_utente', '=', Auth::user()->id)
            ->value('orario_ingresso_mattina');

        $orario_uscita_mattina = DB::table('timesheets')
            ->where('data',  '=', Carbon::now()
                ->format('Y-m-d'))
                ->where('id_utente', '=', Auth::user()->id)
            ->value('orario_uscita_mattina');

        $orario_ingresso_pomeriggio = DB::table('timesheets')
            ->where('data',  '=', Carbon::now()
                ->format('Y-m-d'))
                ->where('id_utente', '=', Auth::user()->id)
            ->value('orario_ingresso_pomeriggio');

        $orario_uscita_pomeriggio = DB::table('timesheets')
            ->where('data',  '=', Carbon::now()
                ->format('Y-m-d'))
                ->where('id_utente', '=', Auth::user()->id)
            ->value('orario_uscita_pomeriggio');

        if ($orario_ingresso_mattina == null) {
            Timesheet::insert(
                [
                    'id_utente' => Auth::user()->id,
                    'data' => Carbon::now()->format('Y-m-d'),
                    'anno' =>  Carbon::now()->format('Y'),
                    'mese' =>  Carbon::now()->format('m'),
                    'giorno' =>  Carbon::now()->format('d'),
                    'orario_ingresso_mattina' => Carbon::now()->format('H:i'),
                ]
            );
        } elseif ($orario_ingresso_mattina != null && $orario_uscita_mattina == null) {
            Timesheet::where('id_utente', '=', Auth::user()->id)
                ->where('data', '=', Carbon::now()->format('Y-m-d'))
                ->update([
                    'orario_uscita_mattina' => Carbon::now()->format('H:i'),
                ]);
        } elseif ($orario_uscita_mattina != null && $orario_ingresso_pomeriggio == null) {
            Timesheet::where('id_utente', '=', Auth::user()->id)
                ->where('data', '=', Carbon::now()->format('Y-m-d'))
                ->update([
                    'orario_ingresso_pomeriggio' => Carbon::now()->format('H:i'),
                ]);
        } elseif ($orario_ingresso_pomeriggio != null && $orario_uscita_pomeriggio == null) {
            Timesheet::where('id_utente', '=', Auth::user()->id)
                ->where('data', '=', Carbon::now()->format('Y-m-d'))
                ->update([
                    'orario_uscita_pomeriggio' => Carbon::now()->format('H:i'),
                ]);
        }

        return redirect('dashboard');
    }

    public function getTimesheet()
    {
        $timesheets = Timesheet::all()
        ->where('data', '=', Carbon::now()->format('Y-m-d'))
        ->where('id_utente', '=', Auth::user()->id);

        $data = [
            "timesheets" => $timesheets
        ];

        return view('timesheet', $data);
    }

}
