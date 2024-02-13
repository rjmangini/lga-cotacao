<?php

namespace App\Models\Parametros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Parametros extends Model
{
    use HasFactory;

    public static function getAll(array $columns, $where = null)
    {
        $dataColumns = [
            ['data' => 'id', 'name' => 'id'],
            ['data' => 'descricao', 'name' => 'descricao'],
        ];

        $data = [];

        $items = DB::table('parametros')
            ->select(["id", db::raw("'Parametros do sistema' as descricao")])
            ->where('id', 1)
            ->first();

        $line = [];
        foreach ($columns as $column) {
            $value = $items->$column;
            $line[$column] = $value;
        }
        $data[] = $line;

        return \App\Helpers\JsonDT::jsonGenerate($data, $columns, $dataColumns);
    }

}
