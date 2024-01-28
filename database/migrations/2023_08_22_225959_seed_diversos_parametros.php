<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\ConsoleOutput;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $output = new ConsoleOutput();
        $output->writeln("");

        $output->writeln("Estados");
        Artisan::call('db:seed', [
            '--class' => 'EstadosSeeder',
        ]);
        
        $output->writeln("Cidades");
        Artisan::call('db:seed', [
            '--class' => 'CidadesSeeder',
        ]);

        $output->writeln("Localidades Atendidas");
        Artisan::call('db:seed', [
            '--class' => 'LocalidadeSeeder',
        ]);

        $output->writeln("Pesos");
        Artisan::call('db:seed', [
            '--class' => 'PesoSeeder',
        ]);

        $output->writeln("Regiões");
        Artisan::call('db:seed', [
            '--class' => 'RegiaoSeeder',
        ]);

        $output->writeln("Parametros");
        Artisan::call('db:seed', [
            '--class' => 'ParametroSeeder',
        ]);

        $output->writeln("Unidades");
        Artisan::call('db:seed', [
            '--class' => 'UnidadeSeeder',
        ]);

        $output->writeln("Parametros");
        Artisan::call('db:seed', [
            '--class' => 'ParametrosSeeder',
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
