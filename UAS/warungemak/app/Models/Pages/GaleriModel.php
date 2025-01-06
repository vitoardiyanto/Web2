<?php

namespace App\Models\Pages;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    protected $table      = 'galeri';
    protected $primaryKey = 'id_galeri';
    protected $allowedFields = ['id_galeri', 'gambar_galeri'];

    public function getAllGaleri()
    {
        return $this->orderBy('id_galeri', 'ASC')->findAll();
    }
    
}
