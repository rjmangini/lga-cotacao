<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Menu
{

    public static int $user;

    public static function createMenu(int $user): array
    {
        self::$user = $user;

        $items = DB::table('menus')
            ->select('id', 'descricao', 'classe')
            ->where('pai', 0)
            ->orderBy('ordem')
            ->get();

        $menu = [];
        foreach ($items as $item) {
            $menu[] = [
                'icon' => $item->classe,
                'name' => $item->descricao,
                'submenu' => self::subMenu($item->id),
            ];
        }

        return $menu;
    }

    public static function subMenu(int $pai): array
    {

        $items = DB::table('menus')
            ->join('programs', 'menus.program_id', '=', 'programs.id')
            ->join('user_programs', 'user_programs.program_id', '=', 'programs.id')
            ->where('menus.pai', $pai)
            ->where('user_programs.user_id', self::$user)
            ->orderBy('menus.ordem')
            ->orderBy('menus.program_id')
            ->get();

        $submenu =[];
        foreach ($items as $item) {
            $submenu[] = [
                'icon' => $item->classe,
                'name' => $item->nome,
                'controller' => $item->controller,
            ];
        }

        return $submenu;
    }

}
