<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use App\Models\TotalHour;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Rap2hpoutre\FastExcel\FastExcel;

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
                    'matricola' => Auth::user()->matricola,
                    'nome' => Auth::user()->nome,
                    'cognome' => Auth::user()->cognome,
                    'data' => Carbon::now()->format('Y-m-d'),
                    'anno' =>  Carbon::now()->format('Y'),
                    'mese' =>  Carbon::now()->format('m'),
                    'giorno' =>  Carbon::now()->format('d'),
                    'orario_ingresso_mattina' => Carbon::now()->format('H:i'),
                    'incarico' => Auth::user()->incarico
                ]
            );

            TotalHour::insert(
                [
                    'id_utente' => Auth::user()->id,
                    'data' => Carbon::now()->format('Y-m-d'),
                    'ore_ingresso_mattina' => Carbon::now()->format('H'),
                    'minuti_ingresso_mattina' => Carbon::now()->format('i'),
                ]
            );
        } elseif ($orario_ingresso_mattina != null && $orario_uscita_mattina == null) {
            Timesheet::where('id_utente', '=', Auth::user()->id)
                ->where('data', '=', Carbon::now()->format('Y-m-d'))
                ->update([
                    'orario_uscita_mattina' => Carbon::now()->format('H:i'),
                ]);

            TotalHour::where('id_utente', '=', Auth::user()->id)
                ->where('data', '=', Carbon::now()->format('Y-m-d'))
                ->update([
                    'ore_uscita_mattina' => Carbon::now()->format('H'),
                    'minuti_uscita_mattina' => Carbon::now()->format('i'),
                ]);
        } elseif ($orario_uscita_mattina != null && $orario_ingresso_pomeriggio == null) {
            Timesheet::where('id_utente', '=', Auth::user()->id)
                ->where('data', '=', Carbon::now()->format('Y-m-d'))
                ->update([
                    'orario_ingresso_pomeriggio' => Carbon::now()->format('H:i'),
                ]);

            TotalHour::where('id_utente', '=', Auth::user()->id)
                ->where('data', '=', Carbon::now()->format('Y-m-d'))
                ->update([
                    'ore_ingresso_pomeriggio' => Carbon::now()->format('H'),
                    'minuti_ingresso_pomeriggio' => Carbon::now()->format('i'),
                ]);
        } elseif ($orario_ingresso_pomeriggio != null && $orario_uscita_pomeriggio == null) {
            Timesheet::where('id_utente', '=', Auth::user()->id)
                ->where('data', '=', Carbon::now()->format('Y-m-d'))
                ->update([
                    'orario_uscita_pomeriggio' => Carbon::now()->format('H:i'),
                ]);

            TotalHour::where('id_utente', '=', Auth::user()->id)
                ->where('data', '=', Carbon::now()->format('Y-m-d'))
                ->update([
                    'ore_uscita_pomeriggio' => Carbon::now()->format('H'),
                    'minuti_uscita_pomeriggio' => Carbon::now()->format('i'),
                    'ore_totali' => $this->getHoursPerDay()
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

    public function printTimesheet()
    {
       $month = Carbon::now()->format('M-Y');
        return (new FastExcel(Timesheet::all()->where('mese', '=', Carbon::now()->format('m'))))
            ->download($month.'.csv');
    }

    public function getHoursPerDay()
    {
        $hourStart = DB::table('total_hours')
            ->where('data',  '=', Carbon::now()
                ->format('Y-m-d'))
            ->where('id_utente', '=', Auth::user()->id)
            ->value('ore_ingresso_mattina');


        $hourEnd = DB::table('total_hours')
            ->where('data',  '=', Carbon::now()
                ->format('Y-m-d'))
            ->where('id_utente', '=', Auth::user()->id)
            ->value('ore_uscita_mattina');

        $hourStart1 = DB::table('total_hours')
            ->where('data',  '=', Carbon::now()
                ->format('Y-m-d'))
            ->where('id_utente', '=', Auth::user()->id)
            ->value('ore_ingresso_pomeriggio');

        $hourEnd1 = DB::table('total_hours')
            ->where('data',  '=', Carbon::now()
                ->format('Y-m-d'))
            ->where('id_utente', '=', Auth::user()->id)
            ->value('ore_uscita_pomeriggio');

        $minuteStart = DB::table('total_hours')
            ->where('data',  '=', Carbon::now()
                ->format('Y-m-d'))
            ->where('id_utente', '=', Auth::user()->id)
            ->value('minuti_ingresso_mattina');


        $minuteEnd = DB::table('total_hours')
            ->where('data',  '=', Carbon::now()
                ->format('Y-m-d'))
            ->where('id_utente', '=', Auth::user()->id)
            ->value('minuti_uscita_mattina');

        $minuteStart1 = DB::table('total_hours')
            ->where('data',  '=', Carbon::now()
                ->format('Y-m-d'))
            ->where('id_utente', '=', Auth::user()->id)
            ->value('minuti_ingresso_pomeriggio');

        $minuteEnd1 = DB::table('total_hours')
            ->where('data',  '=', Carbon::now()
                ->format('Y-m-d'))
            ->where('id_utente', '=', Auth::user()->id)
            ->value('minuti_uscita_pomeriggio');


        if ($minuteStart >= 30) {
            $hourStart = $hourStart + 1;
        } 
        if ($minuteEnd >= 30) {
            $hourEnd = $hourEnd + 1;
        } 
        if ($minuteStart1 >= 30) {
            $hourStart1 = $hourStart1 + 1;
        } 
        if ($minuteEnd1 >= 30) {
            $hourEnd1 = $hourEnd1 + 1;
        }

        //dd($hourStart, $hourStart1, $hourEnd, $hourEnd1);

        $morningHours = $hourEnd - $hourStart;
        $eveningHours = $hourEnd1 - $hourStart1;

        //dd($morningHours, $eveningHours);

        $numberOfHours = $morningHours + $eveningHours;

        return $numberOfHours;
    }


}
