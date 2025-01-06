<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Midtrans extends BaseConfig
{
    public $server_key = 'SB-Mid-server-osST89bTb7nqtlaitMNMmadN';  // Ganti dengan Server Key Anda dari Midtrans
    public $client_key = 'SB-Mid-client-4rPZqSnQX_OANJoy';  // Ganti dengan Client Key Anda dari Midtrans
    public $is_production = false;           // Set ke true jika aplikasi Anda berada di environment produksi
}
