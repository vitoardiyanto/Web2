<?php

if (!function_exists('getHargaMenu')) {
    function getHargaMenu($id_menu)
    {
        $db = \Config\Database::connect();
        $query = $db->table('menu')->where('id_menu', $id_menu)->get();
        $menu = $query->getRow();

        return $menu ? $menu->price : 0;
    }
}