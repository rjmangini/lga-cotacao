<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParametrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parametros')->truncate();

        DB::table('parametros')->insert([
            'id' => 1,
            'capatazia_min' => 0,
            'capatazia_val' => 0,
            'taxanf_capital' => 0,
            'taxanf_interior' => 0,
            'frap_valor' => 0,
            'pesomax' => 30,
            'taxanf_capital2' => 0,
            'taxanf_interior2' => 0,
            'valornf' => 0,
            'valormax_capital' => 0,
            'valormax_interior' => 0,
            'valormax_aeroporto' => 0,
            'email' => 'rjmangini@gmail.com',
            'taxa1' => 0,
        ]);
    }
}
