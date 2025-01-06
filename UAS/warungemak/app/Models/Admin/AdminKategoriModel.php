<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AdminKategoriModel extends Model
{
    protected $table = 'kategori_menu'; // Nama tabel di database
    protected $primaryKey = 'id_kategori'; // Primary key tabel

    // Kolom yang diizinkan untuk diisi secara langsung (mass assignment)
    protected $allowedFields = ['id_kategori', 'nama_kategori', 'deskripsi_kategori'];

    // Gunakan fitur timestamp untuk `created_at` dan `updated_at`
    protected $useTimestamps = true;


    /**
     * Mendapatkan semua data menu.
     *
     * @return array
     */
    public function getAllKategori()
    {
        return $this->findAll();
    }

    /**
     * Mendapatkan data menu berdasarkan ID.
     *
     * @param int $id_kategori
     * @return array|null
     */
    public function getKategoriById($id_kategori)
    {
        return $this->where('id_kategori', $id_kategori)->first();
    }

    /**
     * Menambahkan data menu baru.
     *
     * @param array $data
     * @return bool
     */
    public function addKategori($data)
    {
        return $this->insert($data);
    }

    /**
     * Mengupdate data menu.
     *
     * @param int $id_kategori
     * @param array $data
     * @return bool
     */
    public function updateKategori($id_kategori, $data)
    {
        return $this->update($id_kategori, $data);
    }

    /**
     * Menghapus data menu berdasarkan ID.
     *
     * @param int $id_kategori
     * @return bool
     */
    public function deleteKategori($id_kategori)
    {
        return $this->delete($id_kategori);
    }

    // Fungsi untuk mereset AUTO_INCREMENT
    public function resetIdKategori()
    {
        $db = \Config\Database::connect();  // Mendapatkan koneksi ke database

        // Reset AUTO_INCREMENT
        $db->query('ALTER TABLE kategori_menu AUTO_INCREMENT = 1');
    }

    public function countAll()
    {
        return $this->countAllResults();
    }
    
}
