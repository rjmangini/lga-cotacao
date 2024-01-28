<?php

namespace Database\Seeders;

use App\Models\Manutencao\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dados = [
            ["nome" => "Localidades", "controller" => "localidades.index", "grupo" => 9],
            ["nome" => "Pesos", "controller" => "pesos.index", "grupo" => 9],
            ["nome" => "Região", "controller" => "regioes.index", "grupo" => 9],
            ["nome" => "Tabelas", "controller" => "tabelas.index", "grupo" => 9],
            ["nome" => "Clientes", "controller" => "clientes.index", "grupo" => 9],
            ["nome" => "Cotações", "controller" => "cotacoes.index", "grupo" => 9],
            ["nome" => "Usuários", "controller" => "users.index", "grupo" => 9],
            ["nome" => "Unidades", "controller" => "unidades.index", "grupo" => 9],
            ["nome" => "Parametros", "controller" => "parametros.index", "grupo" => 9],
            ["nome" => "Dashboard", "controller" => "welcome", "grupo" => 9],
            ["nome" => "Destinatários", "controller" => "destinatarios.index", "grupo" => 9],
            ["nome" => "Importar Dados", "controller" => "fileimport.index", "grupo" => 9],
            ["nome" => "Relatório Cotação", "controller" => "relatoriocotacao.index", "grupo" => 9],
            ["nome" => "Estados", "controller" => "estados.index", "grupo" => 9],
            ["nome" => "Cidades", "controller" => "cidades.index", "grupo" => 9],
        ];

        foreach ($dados as $dado) {
            Program::create($dado);
        }
    }
}
