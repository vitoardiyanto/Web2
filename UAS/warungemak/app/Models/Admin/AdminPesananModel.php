<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AdminPesananModel extends Model
{
    protected $table = 'orders'; // Nama tabel di database
    protected $primaryKey = 'id_order'; // Primary key tabel

    // Kolom yang diizinkan untuk diisi secara langsung (mass assignment)
    protected $allowedFields =
    [
        'id_users',
        'total_harga',
        'alamat',
        'tanggal_order',
        'status_order',
        'tgl_pesanansiap',
        'jenis_pengiriman',
        'id_wilayah',
        'ongkos_kirim',
        'catatan'
    ];

    // Gunakan fitur timestamp untuk `created_at` dan `updated_at`
    protected $useTimestamps = false;

    public function getOrderById($id_order)
    {
        $builder = $this->builder();
        $builder->select('
            orders.id_order,
            orders.tanggal_order,
            orders.alamat,
            orders.jenis_pengiriman,
            orders.catatan,
            orders.status_order,
            orders.tgl_pesanansiap,
            orders.ongkos_kirim,
            orders.total_harga,
            users.nama AS nama_pemesan,
            wilayah.nama_wilayah
        ');
        $builder->join('users', 'users.id_users = orders.id_users');
        $builder->join('wilayah', 'wilayah.id_wilayah = orders.id_wilayah');
        $builder->where('orders.id_order', $id_order);
        return $builder->get()->getRow();
    }

    public function getPesananById($id_order)
    {
        return $this->find($id_order);
    }

    public function getAllPesanan()
    {
        return $this->select('
                orders.id_order,
                orders.tanggal_order,
                orders.status_order,
                users.nama AS nama_pemesan,
            ')
            ->join('users', 'users.id_users = orders.id_users')
            ->orderBy('orders.tanggal_order', 'DESC')
            ->findAll(); // Ambil hasil sebagai object
    }

    /**
     * Mendapatkan semua data menu.
     *
     * @return array
     */


    /**
     * Menghapus data menu berdasarkan ID.
     *
     * @param int $id_order
     * @return bool
     */
    public function deletePesanan($id_order)
    {
        return $this->delete($id_order);
    }

    public function countAll()
    {
        return $this->countAllResults();
    }
}
