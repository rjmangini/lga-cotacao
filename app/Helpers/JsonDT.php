<?php

namespace App\Helpers;

use Cocur\Slugify\Slugify;

class JsonDT
{

    public static function jsonGenerate(array $data, array $fields, array $columns)
    {
        $slug = new Slugify();
        $slugColumns = [];
        $slugData = [];
        
        foreach ($fields as $column) {
            $columnName = $slug->Slugify($column, ['separator' => '_']);
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
        $slug = new Slugify();
        $slugColumns = [];
        $slugData = [];

        foreach ($fields as $column) {
            $columnName = $slug->Slugify($column, ['separator' => '_']);
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
