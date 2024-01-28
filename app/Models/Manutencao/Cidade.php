<?php

namespace App\Models\Manutencao;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cidade extends Model
{
    use HasFactory;

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function cliente(): HasMany
    {
        return $this->hasMany(Cliente::class);
    }

    public static function getAll(array $columns, $where = null)
    {
        $dataColumns = [
            ['data' => 'id', 'name' => 'id'],
            ['data' => 'nome', 'name' => 'nome'],
        ];

        $data = [];

        if (is_null($where)) {
            $items = Cidade::all();
        } else {
            $items = new Cidade();
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
            $data[] = $line;
        }

        return \App\Helpers\JsonDT::jsonGenerate($data, $columns, $dataColumns);
    }

    public static function getSelect2(array $columns, array $where = null, $id = 0)
    {
        $dataColumns = [
            ['data' => 'id', 'name' => 'id'],
            ['data' => 'nome', 'name' => 'nome'],
        ];

        $data = [];

        if (is_null($where)) {
            $items = Cidade::all();
        } else {
            $items = new Cidade();
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
