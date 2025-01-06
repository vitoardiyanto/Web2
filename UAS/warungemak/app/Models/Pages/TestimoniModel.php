<?php

namespace App\Models\Pages;

use CodeIgniter\Model;

class TestimoniModel extends Model
{
    protected $table      = 'testimoni';
    protected $primaryKey = 'id_testimoni';
    protected $allowedFields = ['id_testimoni', 'gambar_testimoni', 'nama_pelanggan_testimoni'];

    public function getAllTestimoni()
    {
        return $this->orderBy('id_testimoni', 'ASC')->findAll();
    }
    
}
