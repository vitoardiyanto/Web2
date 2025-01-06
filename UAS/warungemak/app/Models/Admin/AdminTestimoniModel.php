<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AdminTestimoniModel extends Model
{
    protected $table = 'testimoni'; // Nama tabel di database
    protected $primaryKey = 'id_testimoni'; // Primary key tabel

    // Kolom yang diizinkan untuk diisi secara langsung (mass assignment)
    protected $allowedFields = ['id_testimoni', 'gambar_testimoni', 'nama_pelanggan_testimoni'];

    // Gunakan fitur timestamp untuk `created_at` dan `updated_at`
    protected $useTimestamps = true;

    

    /**
     * Mendapatkan semua data menu.
     *
     * @return array
     */
    public function getAllTestimoni()
    {
        return $this->findAll();
    }

    /**
     * Mendapatkan data menu berdasarkan ID.
     *
     * @param int $id_testimoni
     * @return array|null
     */
    public function getTestimoniById($id_testimoni)
    {
        return $this->where('id_testimoni', $id_testimoni)->first();
    }

    /**
     * Menambahkan data menu baru.
     *
     * @param array $data
     * @return bool
     */
    public function addTestimoni($data)
    {
        return $this->insert($data);
    }

    /**
     * Mengupdate data menu.
     *
     * @param int $id_testimoni
     * @param array $data
     * @return bool
     */
    public function updateTestimoni($id_testimoni, $data)
    {
        return $this->update($id_testimoni, $data);
    }

    /**
     * Menghapus data menu berdasarkan ID.
     *
     * @param int $id_testimoni
     * @return bool
     */
    public function deleteTestimoni($id_testimoni)
    {
        return $this->delete($id_testimoni);
    }

    public function countAll()
    {
        return $this->countAllResults();
    }
    
}
