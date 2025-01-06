<?php

namespace App\Models\Users;

use CodeIgniter\Model;

class LoginUsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_users';

    protected $allowedFields =
    [
        'id_role',
        'nama',
        'email',
        'nomor_hp',
        'password',
        'jenis_kelamin',
        'alamat',
        'tgl_lahir',
        'created_at', 
        'updated_at'
    ];
    protected $beforeInsert = ['assignDefaultRole'];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';

    protected function assignDefaultRole(array $data)
    {
        if (!isset($data['data']['id_role'])) {
            $data['data']['id_role'] = 2; // Default ke user
        }

        return $data;
    }
}
