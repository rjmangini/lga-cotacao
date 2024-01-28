<?php

namespace App\Models\Cadastro;

use App\Models\Manutencao\Cidade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cliente extends Model
{
    use HasFactory;

    protected $with = ['cidade'];

    public function cidade(): BelongsTo
    {
        return $this->belongsTo(Cidade::class);
    }

    public static function getAll(array $columns)
    {
        $dataColumns = [
            ['data' => 'id', 'name' => 'id'],
            ['data' => 'razaosocial', 'name' => 'razaosocial'],
            ['data' => 'email', 'name' => 'email'],
            ['data' => 'fone1', 'name' => 'fone1'],
            ['data' => 'cidade_nome', 'name' => 'cidade_nome'],
        ];

        $data = [];

        $items = Cliente::all();
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
            ['data' => 'razaosocial', 'name' => 'razaosocial'],
        ];

        $data = [];

        if (is_null($where)) {
            $items = Cliente::all();
        } else {
            $items = new Cliente();
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
