<?php

namespace App\Helpers;

use Illuminate\Support\Str;
class JsonDT
{

    public static function jsonGenerate(array $data, array $fields, array $columns)
    {
        $slugColumns = [];
        $slugData = [];
        
        foreach ($fields as $column) {
            $columnName = str_replace('.', '_', $column);
            $slugColumns[] = $columnName;
        }

        foreach ($data as $item) {
            $slugItems = [];
            $x = 0;
            // dd($columns);
            foreach ($slugColumns as $column) {
                $slugItems[$column] = $item[$fields[$x++]];
            }
            $slugData[] = $slugItems;
        }

        return ['columns' => $columns, 'data' => $slugData];
    }

    public static function jsonSelect2(array $data, array $fields, array $columns = ['id', 'text'])
    {
        $slugColumns = [];
        $slugData = [];

        foreach ($fields as $column) {
            $columnName = str_replace('.', '_', $column);
            $slugColumns[] = $columnName;
        }

        foreach ($data as $item) {
            $slugItems = [];
            $x = 0;
            // dd($columns);
            foreach ($columns as $column) {
                $slugItems[$column] = $item[$fields[$x++]];
            }
            $slugData[] = $slugItems;
        }

        return ['results' => $slugData, 'pagination' => ["more" => false]];
    }

}
