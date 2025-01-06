<?php

namespace App\Controllers;

use App\Models\users\LoginUsersModel;

// Mengimpor model MenuModel

class UsersLogin extends BaseController
{
    public function loginusers()
    {
        $currentUri = service('uri')->getSegment(1);
        $data['currentUri'] = $currentUri;

        echo view('layout\header');
        echo view('layout\navbar', $data);
        echo view('userslogin\login');
        echo view('layout\footer');
    }

    public function authenticate()
    {
        $session = session();
        $LoginUsersModel = new LoginusersModel();

        // Ambil data dari form login
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Cek validasi users
        $users = $LoginUsersModel->where('email', $email)->first();

        if ($users) {
            // Verifikasi password
            if (password_verify($password, $users['password'])) {
                // Set session jika login berhasil
                $session->set([
                    'isLoggedInUser' => true,
                    'nama'   => $users['nama'], // Ganti 'nama' dengan field nama di database
                    'id_users'     => $users['id_users'],  // Id users (opsional untuk kebutuhan lanjutan)
                ]);

                return redirect()->to(base_url('home'));
            } else {
                $session->setFlashdata('error', 'Password salah.');
            }
        } else {
            $session->setFlashdata('error', 'Email salah.');
        }

        return redirect()->to(base_url('login'));
    }

    public function logoutusers()
    {
        // Logout user, hapus session terkait user
        $session = session();
        $session->remove('isLoggedInUser');
        $session->remove('id_users');
        return redirect()->to(base_url('login'));  // Kembali ke halaman login
    }

    public function registerusers()
    {
        $currentUri = service('uri')->getSegment(1);
        $data['currentUri'] = $currentUri;

        echo view('layout\header');
        echo view('layout\navbar', $data);
        echo view('userslogin\register');
        echo view('layout\footer');
    }

    public function daftaruser()
    {
        // Validasi input
        $validation = $this->validate([
            'nama'          => 'required|min_length[3]|max_length[100]',
            'email'         => 'required|valid_email|is_unique[users.email]',
            'nomor_hp'      => 'required|numeric|min_length[10]|max_length[15]',
            'password'      => 'required|min_length[6]',
            'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
            'alamat'        => 'required',
            'tgl_lahir'     => 'required|valid_date[Y-m-d]',
        ]);

        if (!$validation) {
            // Kembali ke halaman registrasi dengan pesan error
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        // Jika validasi berhasil
        $userModel = new LoginUsersModel();

        // Hash password
        $hashedPassword = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        // Data yang akan dimasukkan ke database
        $data = [
            'nama'          => $this->request->getPost('nama'),
            'email'         => $this->request->getPost('email'),
            'nomor_hp'      => $this->request->getPost('nomor_hp'),
            'password'      => $hashedPassword,
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat'        => $this->request->getPost('alamat'),
            'tgl_lahir'     => $this->request->getPost('tgl_lahir'),
            'role_id'       => 2,
        ];

        // Simpan data ke database
        if ($userModel->insert($data)) {
            return redirect()->to(base_url('login'))->with('success', 'Akun berhasil dibuat! Silakan login.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal membuat akun. Silakan coba lagi.');
        }
    }
}
