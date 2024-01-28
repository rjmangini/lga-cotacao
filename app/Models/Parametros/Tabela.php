<?php

namespace App\Models\Parametros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tabela extends Model
{
    use HasFactory, SoftDeletes;

    protected $with = ['regiao', 'peso'];

    public function regiao(): BelongsTo
    {
        return $this->belongsTo(Regiao::class);
    }

    public function peso(): BelongsTo
    {
        return $this->belongsTo(Peso::class);
    }

    public static function getAll(array $columns)
    {
        $dataColumns = [
            ['data' => 'id', 'name' => 'id'],
            ['data' => 'tabela', 'name' => 'tabela'],
            ['data' => 'regiao_descricao', 'name' => 'regiao_descricao'],
            ['data' => 'regiao_raio', 'name' => 'regiao_raio'],
            ['data' => 'peso_descricao', 'name' => 'peso_descricao'],
            ['data' => 'capital', 'name' => 'capital'],
            ['data' => 'interior', 'name' => 'interior'],
            ['data' => 'redespacho', 'name' => 'redespacho'],
        ];

        $data = [];

        $items = Tabela::all();
        foreach ($items as $item) {
            $line = [];
            foreach ($columns as $column) {
                $fields = explode('.', $column);
                $value = null;
                if (count($fields) == 1) {
                    $table = "";
                    $field = $fields[0];
                    $value = $item->$field;
                }
                if (count($fields) == 2) {
                    $table = $fields[0];
                    $field = $fields[1];
                    $value = $item->$table->$field;
                }
                $line[$column] = $value;
            }
            $data[] = $line;
        }

        return \App\Helpers\JsonDT::jsonGenerate($data, $columns, $dataColumns);
    }

    public static function getSelect2(array $columns, array $where = null, $id = 0)
    {
        $dataColumns = [
            ['data' => 'id', 'name' => 'id'],
            ['data' => 'tabela', 'name' => 'tabela'],
        ];

        $data = [];

        if (is_null($where)) {
            $items = Tabela::all();
        } else {
            $items = new Tabela();
            foreach ($where as $key => $value) {
                $items = $items->where($key, 'like', "%{$value}%");
            }
            $items = $items->get();
        }

        foreach ($items as $item) {
            $line = [];
            foreach ($columns as $column) {
                $fields = explode('.', $column);
                $value = null;
                if (count($fields) == 1) {
                    $table = "";
                    $field = $fields[0];
                    $value = $item->$field;
                }
                if (count($fields) == 2) {
                    $table = $fields[0];
                    $field = $fields[1];
                    $value = $item->$table->$field;
                }
                $line[$column] = $value;
            }
            if ($item->id = $id) {
                $line['selected'] = true;
            }
            $data[] = $line;
        }

        return \App\Helpers\JsonDT::jsonSelect2($data, $columns);
    }

}
