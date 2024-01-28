<?php

namespace Database\Seeders;

use App\Models\Parametros\Regiao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegiaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Regiao::create(['descricao' => 'SP', 'raio' => 'RAIO 01']);
        Regiao::create(['descricao' => 'MG', 'raio' => 'RAIO 02']);
        Regiao::create(['descricao' => 'PR', 'raio' => 'RAIO 03']);
        Regiao::create(['descricao' => 'RJ', 'raio' => 'RAIO 04']);
        Regiao::create(['descricao' => 'SC', 'raio' => 'RAIO 05']);
        Regiao::create(['descricao' => 'DF', 'raio' => 'RAIO 06']);
        Regiao::create(['descricao' => 'ES', 'raio' => 'RAIO 07']);
        Regiao::create(['descricao' => 'MS', 'raio' => 'RAIO 08']);
        Regiao::create(['descricao' => 'RS', 'raio' => 'RAIO 09']);
        Regiao::create(['descricao' => 'GO', 'raio' => 'RAIO 10']);
        Regiao::create(['descricao' => 'TO', 'raio' => 'RAIO 11']);
        Regiao::create(['descricao' => 'BA', 'raio' => 'RAIO 12']);
        Regiao::create(['descricao' => 'MT', 'raio' => 'RAIO 13']);
        Regiao::create(['descricao' => 'AL', 'raio' => 'RAIO 14']);
        Regiao::create(['descricao' => 'SE', 'raio' => 'RAIO 15']);
        Regiao::create(['descricao' => 'CE', 'raio' => 'RAIO 16']);
        Regiao::create(['descricao' => 'PB', 'raio' => 'RAIO 17']);
        Regiao::create(['descricao' => 'PE', 'raio' => 'RAIO 18']);
        Regiao::create(['descricao' => 'RN', 'raio' => 'RAIO 19']);
        Regiao::create(['descricao' => 'AM', 'raio' => 'RAIO 20']);
        Regiao::create(['descricao' => 'MA', 'raio' => 'RAIO 21']);
        Regiao::create(['descricao' => 'PA', 'raio' => 'RAIO 22']);
        Regiao::create(['descricao' => 'PI', 'raio' => 'RAIO 23']);
        Regiao::create(['descricao' => 'RO', 'raio' => 'RAIO 24']);
        Regiao::create(['descricao' => 'AP', 'raio' => 'RAIO 25']);
        Regiao::create(['descricao' => 'RR', 'raio' => 'RAIO 26']);
        Regiao::create(['descricao' => 'AC', 'raio' => 'RAIO 27']);
    }
}
