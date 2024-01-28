<?php

namespace Database\Seeders;

use App\Models\Manutencao\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dados = [
            ["id" => 1,"descricao" => "Cadastros","pai" => 0,"program_id" => 0,"classe" => "fa fa-edit","ordem" => 1,"tipo" => "M"],
            ["id" => 2,"descricao" => "Parametros","pai" => 0,"program_id" => 0,"classe" => "fa fa-cogs","ordem" => 2,"tipo" => "M"],
            ["id" => 3,"descricao" => "Localidades","pai" => 2,"program_id" => 1,"classe" => "","ordem" => 1,"tipo" => "C"],
            ["id" => 4,"descricao" => "Pesos","pai" => 2,"program_id" => 2,"classe" => "","ordem" => 2,"tipo" => "C"],
            ["id" => 5,"descricao" => "Região","pai" => 2,"program_id" => 3,"classe" => "","ordem" => 3,"tipo" => "C"],
            ["id" => 6,"descricao" => "Tabelas","pai" => 2,"program_id" => 4,"classe" => "","ordem" => 4,"tipo" => "C"],
            ["id" => 7,"descricao" => "Clientes","pai" => 1,"program_id" => 5,"classe" => " ","ordem" => 2,"tipo" => "C"],
            ["id" => 8,"descricao" => "Cotações","pai" => 1,"program_id" => 6,"classe" => "","ordem" => 3,"tipo" => "C"],
            ["id" => 9,"descricao" => "Manutenção","pai" => 0,"program_id" => 0,"classe" => "fa fa-wrench","ordem" => 3,"tipo" => "M"],
            ["id" => 10,"descricao" => "Usuários","pai" => 9,"program_id" => 7,"classe" => " ","ordem" => 1,"tipo" => "C"],
            ["id" => 11,"descricao" => "Unidades","pai" => 2,"program_id" => 8,"classe" => "","ordem" => 5,"tipo" => "C"],
            ["id" => 12,"descricao" => "Parametro","pai" => 2,"program_id" => 9,"classe" => "","ordem" => 6,"tipo" => "C"],
            ["id" => 13,"descricao" => "Dashboard","pai" => 1,"program_id" => 10,"classe" => "","ordem" => 1,"tipo" => "C"],
            ["id" => 14,"descricao" => "Destinatário","pai" => 1,"program_id" => 11,"classe" => null,"ordem" => 4,"tipo" => "C"],
            ["id" => 15,"descricao" => "Importar Dados","pai" => 9,"program_id" => 12,"classe" => null,"ordem" => 2,"tipo" => "C"],
            ["id" => 16,"descricao" => "Relatório","pai" => 9,"program_id" => 13,"classe" => null,"ordem" => 3,"tipo" => "C"],
            ["id" => 17,"descricao" => "Estados","pai" => 9,"program_id" => 14,"classe" => null,"ordem" => 4,"tipo" => "C"],
            ["id" => 18,"descricao" => "Cidades","pai" => 9,"program_id" => 15,"classe" => null,"ordem" => 5,"tipo" => "C"],
        ];

        foreach ($dados as $dado) {
            Menu::create($dado);
        }
    }
}
