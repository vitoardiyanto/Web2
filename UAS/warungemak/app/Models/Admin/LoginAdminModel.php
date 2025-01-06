<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class LoginAdminModel extends Model
{
    protected $table = 'admin'; 
    protected $primaryKey = 'id_admin'; 
    
    protected $allowedFields = ['username', 'password'];
    protected $returnType = 'array';

    

    
}
