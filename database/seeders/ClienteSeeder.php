<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            'id' => 1,
            'cnpj' => '11053341000141',
            'razaosocial' => 'LGA EXPRESS - SOLUCOES LOGISTICAS LTDA ME',
            'endereco' => 'RUA DAS NOGUEIRAS',
            'numero' => '38',
            'bairro' => 'JARDIM SAO PAULO',
            'cidade_id' => 3501608,
            'cep' => '13468-200',
            'email' => 'rjmangini@gmail.com',
            'senha' => Hash::make('admin1234'),
            'nivel' => 99,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('clientes')->insert([
            'id' => 2,
            'cnpj' => '11053341000142',
            'razaosocial' => 'LGA EXPRESS - SOLUCOES LOGISTICAS LTDA ME #2',
            'endereco' => 'RUA DAS NOGUEIRAS',
            'numero' => '38',
            'bairro' => 'JARDIM SAO PAULO',
            'cidade_id' => 3501608,
            'cep' => '13468-200',
            'email' => 'teste1@teste.com',
            'senha' => Hash::make('user1234'),
            'nivel' => 99,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('clientes')->insert([
            'id' => 3,
            'cnpj' => '11053341000143',
            'razaosocial' => 'LGA EXPRESS - SOLUCOES LOGISTICAS LTDA ME #3',
            'endereco' => 'RUA DAS NOGUEIRAS',
            'numero' => '38',
            'bairro' => 'JARDIM SAO PAULO',
            'cidade_id' => 3501608,
            'cep' => '13468-200',
            'email' => 'teste2@teste.com',
            'senha' => Hash::make('user1234'),
            'nivel' => 99,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
