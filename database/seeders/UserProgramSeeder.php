<?php

namespace Database\Seeders;

use App\Models\Manutencao\UserProgram;
use Illuminate\Database\Seeder;

class UserProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dados = [
            ["user_id" => 1, "program_id" => 1,"level" => 4],
            ["user_id" => 1, "program_id" => 2,"level" => 4],
            ["user_id" => 1, "program_id" => 3,"level" => 4],
            ["user_id" => 1, "program_id" => 4,"level" => 4],
            ["user_id" => 1, "program_id" => 5,"level" => 4],
            ["user_id" => 1, "program_id" => 6,"level" => 4],
            ["user_id" => 1, "program_id" => 7,"level" => 2],
            ["user_id" => 1, "program_id" => 8,"level" => 4],
            ["user_id" => 1, "program_id" => 9,"level" => 4],
            ["user_id" => 1, "program_id" => 10,"level" => 4],
            ["user_id" => 1, "program_id" => 11,"level" => 2],
            ["user_id" => 1, "program_id" => 12,"level" => 4],
            ["user_id" => 1, "program_id" => 13,"level" => 4],
            ["user_id" => 1, "program_id" => 14,"level" => 4],
            ["user_id" => 1, "program_id" => 15,"level" => 4],
        ];

        foreach ($dados as $dado) {
            UserProgram::create($dado);
        }
    }
}
