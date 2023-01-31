<?php

namespace Database\Seeders;

use App\Models\Qualification;
use App\Models\Sectors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amministrazione = Sectors::create(['sector_name' => 'amministrazione']);
        $segreteria= Sectors::create(['sector_name' => 'segreteria']);
        $produzione= Sectors::create(['sector_name' => 'produzione']);
        $direzione= Sectors::create(['sector_name' => 'direzione']);
        $commerciale= Sectors::create(['sector_name' => 'commerciale']);

        $amministratore =Qualification::create(['qualification' => 'amministratore' , 'sector_id' => 1]);
        $programmatore = Qualification::create(['qualification' => 'programmatore' , 'sector_id' => 3]);
        $segretaria = Qualification::create(['qualification' => 'segretaria' , 'sector_id' => 2]);
        $DBA = Qualification::create(['qualification' => 'DBA' , 'sector_id' => 3]);
        $sistemista = Qualification::create(['qualification' => 'sistemista' , 'sector_id' => 3]);
        $analista = Qualification::create(['qualification' => 'analista' , 'sector_id' => 3]);
        $analista_programmatore = Qualification::create(['qualification' => 'analista_programmatore' , 'sector_id' => 3]);
        $commercialista = Qualification::create(['qualification' => 'commercialista' , 'sector_id' => 5]);
    }
}
