<?php

namespace Database\Seeders;

use App\Models\Parametros\Parametros;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParametroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dados = [
            "id" => 1,
            "capatazia_min" => 0.20,
            "capatazia_val" => 0.1000,
            "taxanf_capital" => 0.70,
            "taxanf_interior" => 0.90,
            "frap_valor" => 15.0000,
            "pesomax" => 30,
            "taxanf_capital2" => 1.40,
            "taxanf_interior2" => 1.80,
            "valornf" => 5757.9900,
            "valormax_capital" => 50000.0000,
            "valormax_interior" => 20000.0000,
            "valormax_aeroporto" => 200000.0000,
            "email" => " ",
            "taxa1" => 2.00,
        ];
        Parametros::create($dados);
    }
}
