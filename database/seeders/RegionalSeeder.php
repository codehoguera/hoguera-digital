<?php

namespace Database\Seeders;

use App\Models\Regional;
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
            'name' => 'BENI',
            'code_suc' => 'SUC08',
        ]);

        Regional::create([
            'name' => 'SANTA CRUZ',
            'code_suc' => 'SUC04',
        ]);

        Regional::create([
            'name' => 'COCHABAMBA',
            'code_suc' => 'SUC13',
        ]);

        Regional::create([
            'name' => 'CHUQUISACA',
            'code_suc' => 'SUC15',
        ]);

        Regional::create([
            'name' => 'TARIJA',
            'code_suc' => 'SUC05',
        ]);

        Regional::create([
            'name' => 'LA PAZ',
            'code_suc' => 'SUC06',
        ]);

        Regional::create([
            'name' => 'ORURO',
            'code_suc' => 'SUC02',
        ]);

        Regional::create([
            'name' => 'POTOSI',
            'code_suc' => 'SUC10',
        ]);
    }
}
