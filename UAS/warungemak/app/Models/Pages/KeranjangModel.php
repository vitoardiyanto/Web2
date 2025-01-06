<?php

namespace App\Models\Pages;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table      = 'keranjang';
    protected $primaryKey = 'id_keranjang';
    protected $allowedFields = ['id_keranjang', 'id_menu', 'id_users', 'quantity', 'created_at', 'updated_at'];

    public function getKeranjangByUsers($id_users)
    {
        return $this->db->table('keranjang')
        ->select('keranjang.id_keranjang, keranjang.id_menu, keranjang.quantity, daftar_menu.nama_menu, daftar_menu.harga_menu, daftar_menu.gambar_menu')
        ->join('daftar_menu', 'keranjang.id_menu = daftar_menu.id_menu') // Join untuk menggabungkan informasi menu
        ->where('keranjang.id_users', $id_users)
        ->get()
        ->getResultArray();
    }

    public function HapusKeranjangByUser($id_users)
    {
        // Pastikan id_user valid
        if (empty($id_users)) {
            return false;
        }

        // Lakukan penghapusan data
        return $this->where('id_users', $id_users)->delete();
    }

    
}
