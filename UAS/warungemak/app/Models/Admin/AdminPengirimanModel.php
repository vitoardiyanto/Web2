<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AdminPengirimanModel extends Model
{
    protected $table = 'wilayah'; // Nama tabel di database
    protected $primaryKey = 'id_wilayah'; // Primary key tabel

    // Kolom yang diizinkan untuk diisi secara langsung (mass assignment)
    protected $allowedFields =
    [
        'nama_wilayah',
        'tarif_ongkir'
    ];

    // Gunakan fitur timestamp untuk `created_at` dan `updated_at`
    protected $useTimestamps = false;



    /**
     * Mendapatkan semua data menu.
     *
     * @return array
     */
    public function getAllPengiriman()
    {
        return $this->findAll();
    }

    /**
     * Mengupdate data menu.
     *
     * @param int $id_wilayah
     * @param array $data
     * @return bool
     */
    public function updatePengiriman($id_wilayah, $data)
    {
        return $this->update($id_wilayah, $data);
    }

    /**
     * Menghapus data menu berdasarkan ID.
     *
     * @param int $id_wilayah
     * @return bool
     */
    public function deletePengiriman($id_wilayah)
    {
        return $this->delete($id_wilayah);
    }

    public function countAll()
    {
        return $this->countAllResults();
    }
}
