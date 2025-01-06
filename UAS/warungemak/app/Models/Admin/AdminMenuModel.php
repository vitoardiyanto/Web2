<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AdminMenuModel extends Model
{
    protected $table = 'daftar_menu'; // Nama tabel di database
    protected $primaryKey = 'id_menu'; // Primary key tabel

    // Kolom yang diizinkan untuk diisi secara langsung (mass assignment)
    protected $allowedFields = ['id_menu', 'id_kategori', 'nama_menu', 'deskripsi_menu', 'gambar_menu', 'harga_menu'];

    // Gunakan fitur timestamp untuk `created_at` dan `updated_at`
    protected $useTimestamps = true;


    

    /**
     * Mendapatkan semua data menu.
     *
     * @return array
     */
    public function getAllMenu()
    { {
            return $this->select('daftar_menu.*, kategori_menu.nama_kategori')
                ->join('kategori_menu', 'kategori_menu.id_kategori = daftar_menu.id_kategori') // Join tabel kategori
                ->findAll();
        }
    }


    /**
     * Mendapatkan data menu berdasarkan ID.
     *
     * @param int $id_menu
     * @return array|null
     */
    public function getMenuById($id_menu)
    {
        return $this->where('id_menu', $id_menu)->first();
    }

    // Fungsi untuk mereset AUTO_INCREMENT
    
    public function resetIdMenu()
    {
        $db = \Config\Database::connect();  // Mendapatkan koneksi ke database

        // Reset AUTO_INCREMENT
        $db->query('ALTER TABLE daftar_menu AUTO_INCREMENT = 1');
    }

    /**
     * Menambahkan data menu baru.
     *
     * @param array $data
     * @return bool
     */
    public function addMenu($data)
    {
        return $this->insert($data);
    }

    /**
     * Mengupdate data menu.
     *
     * @param int $id_menu
     * @param array $data
     * @return bool
     */
    public function updateMenu($id_menu, $data)
    {
        return $this->update($id_menu, $data);
    }

    /**
     * Menghapus data menu berdasarkan ID.
     *
     * @param int $id_menu
     * @return bool
     */
    public function deleteMenu($id_menu)
    {
        return $this->delete($id_menu);
    }

    public function countAll()
    {
        return $this->countAllResults();
    }
    

}
