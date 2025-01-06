<?php

namespace App\Models;

use CodeIgniter\Model;

class WilayahModel extends Model
{
    protected $table = 'wilayah';
    protected $primaryKey = 'id_wilayah';
    protected $allowedFields = [
        'nama_wilayah',
        'tarif_ongkir'
    ];
}
