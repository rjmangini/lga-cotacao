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

        $output->writeln("Programs");
        Artisan::call('db:seed', [
            '--class' => 'ProgramSeeder',
        ]);

        $output->writeln("Menus");
        Artisan::call('db:seed', [
            '--class' => 'MenuSeeder',
        ]);

        $output->writeln("Usuários/Programas");
        Artisan::call('db:seed', [
            '--class' => 'UserProgramSeeder',
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
