<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AdminOrderItemsModel extends Model
{


    protected $table = 'order_items';
    protected $primaryKey = 'id_order_items';
    protected $allowedFields = [
        'id_order',
        'id_menu',
        'quantity'
    ];
    protected $useTimestamps = false;

    // Dapatkan detail order items berdasarkan order ID
    public function getOrderItemsByOrderId($id_order)
    {
        $builder = $this->builder();
        $builder->select('order_items.*, daftar_menu.nama_menu, daftar_menu.harga_menu,');
        $builder->join('daftar_menu', 'daftar_menu.id_menu = order_items.id_menu');
        $builder->where('order_items.id_order', $id_order);
        return $builder->get()->getResult();
    }

    

    
}
