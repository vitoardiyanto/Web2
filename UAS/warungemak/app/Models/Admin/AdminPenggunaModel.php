<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AdminPenggunaModel extends Model
{
    protected $table = 'users'; // Nama tabel di database
    protected $primaryKey = 'id_users'; // Primary key tabel

    // Kolom yang diizinkan untuk diisi secara langsung (mass assignment)
    protected $allowedFields =
    [
        'nama',
        'email',
        'nomor_hp',
        'jenis_kelamin',
        'alamat',
        'tgl_lahir'
    ];

    // Gunakan fitur timestamp untuk `created_at` dan `updated_at`
    protected $useTimestamps = true;
    

    public function getPelangganById($id_users)
    {
        return $this->find($id_users);
    }

    /**
     * Mendapatkan semua data menu.
     *
     * @return array
     */
    public function getAllUsers()
    {
        return $this->findAll();
    }


    /**
     * Mengupdate data menu.
     *
     * @param int $id_users
     * @param array $data
     * @return bool
     */
    public function updateUsers($id_users, $data)
    {
        return $this->update($id_users, $data);
    }

    /**
     * Menghapus data menu berdasarkan ID.
     *
     * @param int $id_testimoni
     * @return bool
     */
    public function deleteUsers($id_users)
    {
        return $this->delete($id_users);
    }

    public function countAll()
    {
        return $this->countAllResults();
    }
}
