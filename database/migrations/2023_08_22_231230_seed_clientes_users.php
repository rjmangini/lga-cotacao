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

        $output->writeln("Clientes");
        Artisan::call('db:seed', [
            '--class' => 'ClienteSeeder',
        ]);

        $output->writeln("Usuários");
        Artisan::call('db:seed', [
            '--class' => 'UserSeeder',
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
