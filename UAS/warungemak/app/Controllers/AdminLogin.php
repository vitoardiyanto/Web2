<?php

namespace App\Controllers;

use App\Models\Admin\LoginAdminModel;

// Mengimpor model MenuModel

class AdminLogin extends BaseController
{
    public function loginAdmin()
    {
        echo view('adminlogin\layout\header');
        echo view('adminlogin\login');
        echo view('adminlogin\layout\footer');
    }

    public function authenticate()
    {
        // Ambil data dari form
        $username = $this->request->getPost('username');  // Mengambil username
        $password = $this->request->getPost('password');  // Mengambil password

        // Load model
        $LoginAdminModel = new LoginAdminModel();

        // Cek apakah username dan password cocok
        $admin = $LoginAdminModel->where('username', $username)->first();  // Gunakan username untuk pencarian

        if ($admin && password_verify($password, $admin['password'])) {
            // Set session data jika login sukses
            session()->set('isLoggedInAdmin', true);
            session()->set('id_admin', $admin['id_admin']);
            session()->set('username', $admin['username']);  // Simpan username dalam session

            return redirect()->to(base_url('admin'));  // Arahkan ke dashboard admin
        } else {
            // Jika login gagal
            session()->setFlashdata('error', 'Username atau password salah');
            return redirect()->to(base_url('loginadmin'));  // Kembali ke halaman login
        }
    }

    public function logout()
    {
        // Logout user, hapus session terkait user
        $session = session();
        $session->remove('isLoggedInAdmin');
        $session->remove('id_admin');
        return redirect()->to(base_url('loginadmin'));  // Kembali ke halaman login
    }

}
