<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderItemsModel extends Model
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
    public function getOrderItemsByOrder($id_order)
    {
        return $this->select('order_items.id_order_items, order_items.id_menu, order_items.quantity, daftar_menu.nama_menu, daftar_menu.harga_menu') // Pilih kolom yang dibutuhkan
                    ->join('daftar_menu', 'daftar_menu.id_menu = order_items.id_menu') // Join dengan daftar_menu
                    ->where('id_order', $id_order)
                    ->findAll();  // Menemukan semua data sesuai dengan ID order
    }

    public function getAllItemPesanan()
    {
        return $this->orderBy('id_order', 'ASC')->findAll();
    }

    
}
