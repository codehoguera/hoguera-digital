<?php

namespace Database\Seeders;

use App\Models\Regional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Regional::create([
            'name_regional' => 'BENI',
            'code_suc' => 'SUC08',
        ]);
        Regional::create([
            'name_regional' => 'SANTA CRUZ',
            'code_suc' => 'SUC04',
        ]);
        Regional::create([
            'name_regional' => 'COCHABAMBA',
            'code_suc' => 'SUC13',
        ]);
        Regional::create([
            'name_regional' => 'CHUQUISACA',
            'code_suc' => 'SUC15',
        ]);
        Regional::create([
            'name_regional' => 'TARIJA',
            'code_suc' => 'SUC05',
        ]);
        Regional::create([
            'name_regional' => 'LA PAZ',
            'code_suc' => 'SUC06',
        ]);
        Regional::create([
            'name_regional' => 'SUC02',
            'code_suc' => 'SUC08',
        ]);
        Regional::create([
            'name_regional' => 'POTOSI',
            'code_suc' => 'SUC10',
        ]);

    }
}
