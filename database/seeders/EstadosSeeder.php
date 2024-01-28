<?php

namespace Database\Seeders;

use App\Models\Manutencao\Estado;
use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estado::create(['id' => 11, 'nome' => 'Rondônia', 'sigla' => 'RO']);
        Estado::create(['id' => 12, 'nome' => 'Acre', 'sigla' => 'AC']);
        Estado::create(['id' => 13, 'nome' => 'Amazonas', 'sigla' => 'AM']);
        Estado::create(['id' => 14, 'nome' => 'Roraima', 'sigla' => 'RR']);
        Estado::create(['id' => 15, 'nome' => 'Pará', 'sigla' => 'PA']);
        Estado::create(['id' => 16, 'nome' => 'Amapá', 'sigla' => 'AP']);
        Estado::create(['id' => 17, 'nome' => 'Tocantins', 'sigla' => 'TO']);
        Estado::create(['id' => 21, 'nome' => 'Maranhão', 'sigla' => 'MA']);
        Estado::create(['id' => 22, 'nome' => 'Piauí', 'sigla' => 'PI']);
        Estado::create(['id' => 23, 'nome' => 'Ceará', 'sigla' => 'CE']);
        Estado::create(['id' => 24, 'nome' => 'Rio Grande do Norte', 'sigla' => 'RN']);
        Estado::create(['id' => 25, 'nome' => 'Paraíba', 'sigla' => 'PB']);
        Estado::create(['id' => 26, 'nome' => 'Pernambuco', 'sigla' => 'PE']);
        Estado::create(['id' => 27, 'nome' => 'Alagoas', 'sigla' => 'AL']);
        Estado::create(['id' => 28, 'nome' => 'Sergipe', 'sigla' => 'SE']);
        Estado::create(['id' => 29, 'nome' => 'Bahia', 'sigla' => 'BA']);
        Estado::create(['id' => 31, 'nome' => 'Minas Gerais', 'sigla' => 'MG']);
        Estado::create(['id' => 32, 'nome' => 'Espírito Santo', 'sigla' => 'ES']);
        Estado::create(['id' => 33, 'nome' => 'Rio de Janeiro', 'sigla' => 'RJ']);
        Estado::create(['id' => 35, 'nome' => 'São Paulo', 'sigla' => 'SP']);
        Estado::create(['id' => 41, 'nome' => 'Paraná', 'sigla' => 'PR']);
        Estado::create(['id' => 42, 'nome' => 'Santa Catarina', 'sigla' => 'SC']);
        Estado::create(['id' => 43, 'nome' => 'Rio Grande do Sul', 'sigla' => 'RS']);
        Estado::create(['id' => 50, 'nome' => 'Mato Grosso do Sul', 'sigla' => 'MS']);
        Estado::create(['id' => 51, 'nome' => 'Mato Grosso', 'sigla' => 'MT']);
        Estado::create(['id' => 52, 'nome' => 'Goiás', 'sigla' => 'GO']);
        Estado::create(['id' => 53, 'nome' => 'Distrito Federal', 'sigla' => 'DF']);
    }
}
