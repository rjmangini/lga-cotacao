<?php

namespace Database\Seeders;

use App\Models\Parametros\Peso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Peso::create(['descricao' => 'até 100 g', 'peso' => 0.10]);
        Peso::create(['descricao' => '1 KG', 'peso' => 1]);
        Peso::create(['descricao' => '2 KG', 'peso' => 2]);
        Peso::create(['descricao' => '3 KG', 'peso' => 3]);
        Peso::create(['descricao' => '4 KG', 'peso' => 4]);
        Peso::create(['descricao' => '5 KG', 'peso' => 5]);
        Peso::create(['descricao' => '6 KG', 'peso' => 6]);
        Peso::create(['descricao' => '7 KG', 'peso' => 7]);
        Peso::create(['descricao' => '8 KG', 'peso' => 8]);
        Peso::create(['descricao' => '9 KG', 'peso' => 9]);
        Peso::create(['descricao' => '10 KG', 'peso' => 10]);
        Peso::create(['descricao' => '11 KG', 'peso' => 11]);
        Peso::create(['descricao' => '12 KG', 'peso' => 12]);
        Peso::create(['descricao' => '13 KG', 'peso' => 13]);
        Peso::create(['descricao' => '14 KG', 'peso' => 14]);
        Peso::create(['descricao' => '15 KG', 'peso' => 15]);
        Peso::create(['descricao' => '16 KG', 'peso' => 16]);
        Peso::create(['descricao' => '17 KG', 'peso' => 17]);
        Peso::create(['descricao' => '18 KG', 'peso' => 18]);
        Peso::create(['descricao' => '19 KG', 'peso' => 19]);
        Peso::create(['descricao' => '20 KG', 'peso' => 20]);
        Peso::create(['descricao' => '21 KG', 'peso' => 21]);
        Peso::create(['descricao' => '22 KG', 'peso' => 22]);
        Peso::create(['descricao' => '23 KG', 'peso' => 23]);
        Peso::create(['descricao' => '24 KG', 'peso' => 24]);
        Peso::create(['descricao' => '25 KG', 'peso' => 25]);
        Peso::create(['descricao' => '26 KG', 'peso' => 26]);
        Peso::create(['descricao' => '27 KG', 'peso' => 27]);
        Peso::create(['descricao' => '28 KG', 'peso' => 28]);
        Peso::create(['descricao' => '29 KG', 'peso' => 29]);
        Peso::create(['descricao' => '30 KG', 'peso' => 30]);
    }
}
