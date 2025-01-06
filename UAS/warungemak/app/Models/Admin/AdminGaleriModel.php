<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AdminGaleriModel extends Model
{
    protected $table = 'galeri'; // Nama tabel di database
    protected $primaryKey = 'id_galeri'; // Primary key tabel

    // Kolom yang diizinkan untuk diisi secara langsung (mass assignment)
    protected $allowedFields = ['id_galeri', 'gambar_galeri'];

    // Gunakan fitur timestamp untuk `created_at` dan `updated_at`
    protected $useTimestamps = true;

    

    /**
     * Mendapatkan semua data menu.
     *
     * @return array
     */
    public function getAllGaleri()
    {
        return $this->findAll();
    }

    /**
     * Mendapatkan data menu berdasarkan ID.
     *
     * @param int $id_menu
     * @return array|null
     */
    public function getGaleriById($id_galeri)
    {
        return $this->where('id_galeri', $id_galeri)->first();
    }

    /**
     * Menambahkan data menu baru.
     *
     * @param array $data
     * @return bool
     */
    public function addGaleri($data)
    {
        return $this->insert($data);
    }

    /**
     * Mengupdate data menu.
     *
     * @param int $id_galeri
     * @param array $data
     * @return bool
     */
    public function updateGaleri($id_galeri, $data)
    {
        return $this->update($id_galeri, $data);
    }

    /**
     * Menghapus data menu berdasarkan ID.
     *
     * @param int $id_galeri
     * @return bool
     */
    public function deleteGaleri($id_galeri)
    {
        return $this->delete($id_galeri);
    }

    public function countAll()
    {
        return $this->countAllResults();
    }
    
}
