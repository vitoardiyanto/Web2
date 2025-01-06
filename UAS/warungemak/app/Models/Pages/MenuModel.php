<?php

namespace App\Models\Pages;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table      = 'daftar_menu';
    protected $primaryKey = 'id_menu';
    protected $allowedFields = ['id_menu', 'id_kategori', 'nama_menu', 'deskripsi_menu', 'gambar_menu', 'harga_menu', 'quantity'];

    public function getMenuDenganKategori()

    {
        return $this->select('daftar_menu.*, kategori_menu.deskripsi_kategori, kategori_menu.nama_kategori AS nama_kategori')
                    ->join('kategori_menu', 'kategori_menu.id_kategori = daftar_menu.id_kategori')
                    ->orderBy('kategori_menu.nama_kategori', 'ASC')
                    ->findAll();
    }

    public function getAllMenu()
    { {
            return $this->select('daftar_menu.*, kategori_menu.nama_kategori')
                ->join('kategori_menu', 'kategori_menu.id_kategori = daftar_menu.id_kategori') // Join tabel kategori
                ->findAll();
        }
    }

    public function getMenuById($id)
    {
        return $this->find($id);
    }

    public function getHargaMenu($id)
    {
        $menu = $this->find($id); // Mencari produk berdasarkan ID
        return $menu ? $menu['harga_menu'] : 0;  // Mengembalikan harga produk, atau 0 jika tidak ditemukan
    }

    
}
