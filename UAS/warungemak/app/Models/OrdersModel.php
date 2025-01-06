<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{


    protected $table = 'orders';
    protected $primaryKey = 'id_order';
    protected $allowedFields = [
        'id_order',
        'id_users',
        'total_harga',
        'status_order',
        'alamat',
        'token',
        'tanggal_order',
        'jenis_pengiriman',
        'tgl_pesanansiap',
        'id_wilayah',
        'ongkos_kirim',
        'catatan'
    ];
    protected $useTimestamps = false;

    public function getPesananByUser($userId)
    {
        // Mengambil pesanan berdasarkan ID pengguna
        return $this->where('id_users', $userId)
                    ->orderBy('tanggal_order', 'DESC') // Opsional, untuk mengurutkan berdasarkan tanggal
                    ->findAll();
    }

    public function getOrderItems($order_id)
    {
        return $this->db->table('order_items')
            ->join('daftar_menu', 'daftar_menu.id_menu = order_items.id_menu')
            ->where('order_items.id_order', $order_id)
            ->get()->getResultArray();
    }

    public function getAllPesanan()
    {
        return $this->orderBy('id_order', 'ASC')->findAll();
    }

    
}
