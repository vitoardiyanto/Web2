<?php

namespace App\Controllers;

// Mengimpor model MenuModel
use App\Models\Admin\AdminMenuModel;
use App\Models\Admin\AdminTestimoniModel;
use App\Models\Admin\AdminKategoriModel;
use App\Models\Admin\AdminGaleriModel;
use App\Models\Admin\AdminPenggunaModel;
use App\Models\Admin\AdminPesananModel;
use App\Models\Admin\AdminPengirimanModel;
use App\Models\Admin\AdminOrderItemsModel;


class Admin extends BaseController
{

    protected $AdminMenuModel;
    protected $AdminKategoriModel;
    protected $AdminTestimoniModel;
    protected $AdminGaleriModel;
    protected $AdminPenggunaModel;
    protected $AdminPesananModel;
    protected $AdminPengirimanModel;
    protected $AdminOrderItemsModel;

    public function __construct()
    {

        $this->AdminMenuModel = new AdminMenuModel();
        $this->AdminKategoriModel = new AdminKategoriModel();
        $this->AdminTestimoniModel = new AdminTestimoniModel();
        $this->AdminGaleriModel = new AdminGaleriModel();
        $this->AdminPenggunaModel = new AdminPenggunaModel();
        $this->AdminPesananModel = new AdminPesananModel();
        $this->AdminPengirimanModel = new AdminPengirimanModel();
        $this->AdminOrderItemsModel = new AdminOrderItemsModel();

    }


    // MENAMPILKAN DATA //
    public function admin()
    {

        // Cek apakah user sudah login
        if (!session()->get('isLoggedInAdmin')) {
            return redirect()->to(base_url('loginadmin'));  // Redirect ke halaman login jika belum login
        }

        // Membuat instance dari model
        $AdminMenuModel = new AdminMenuModel();
        $AdminKategoriModel = new AdminKategoriModel();
        $AdminTestimoniModel = new AdminTestimoniModel();
        $AdminGaleriModel = new AdminGaleriModel();
        $AdminPenggunaModel = new AdminPenggunaModel();
        $AdminPesananModel = new AdminPesananModel();
        $AdminPengirimanModel = new AdminPengirimanModel();

        // Mengambil jumlah data dari masing-masing tabel
        $data['daftar_menu_count'] = $AdminMenuModel->countAll();  // Jumlah daftar menu
        $data['kategori_menu_count'] = $AdminKategoriModel->countAll();  // Jumlah kategori menu
        $data['testimoni_count'] = $AdminTestimoniModel->countAll();  // Jumlah testimoni
        $data['galeri_count'] = $AdminGaleriModel->countAll();  // Jumlah galeri
        $data['pengguna_count'] = $AdminPenggunaModel->countAll();  // Jumlah galeri
        $data['pesanan_count'] = $AdminPesananModel->countAll();  // Jumlah galeri
        $data['pengiriman_count'] = $AdminPengirimanModel->countAll();  // Jumlah galeri

        // Menampilkan data ke view
        echo view('admin/layoutadmin/header');
        echo view('admin/layoutadmin/sidebar');
        echo view('admin/admin_home', $data);
        echo view('admin/layoutadmin/footer');
    }

    public function galeri()
    {
        // Cek apakah user sudah login
        if (!session()->get('isLoggedInAdmin')) {
            return redirect()->to(base_url('loginadmin'));  // Redirect ke halaman login jika belum login
        }

        // Menampilkan Data dari database warungemak tabel galeri
        $AdminGaleriModel = new AdminGaleriModel();
        $data['galeri'] = $AdminGaleriModel->getAllGaleri();  // Mengambil semua data menu dari database

        echo view('admin\layoutadmin\header');
        echo view('admin\layoutadmin\sidebar');
        echo view('admin\galeri\admin_galeri', $data);
        echo view('admin\layoutadmin\footer');
    }

    public function menu()
    {
        // Cek apakah user sudah login
        if (!session()->get('isLoggedInAdmin')) {
            return redirect()->to(base_url('loginadmin'));  // Redirect ke halaman login jika belum login
        }

        // Menampilkan Data dari database warungemak tabel daftar_menu
        $AdminMenuModel = new AdminMenuModel();
        $data['daftar_menu'] = $AdminMenuModel->getAllMenu();  // Mengambil semua data menu dari database

        echo view('admin\layoutadmin\header');
        echo view('admin\layoutadmin\sidebar');
        echo view('admin\menu\admin_menu', $data);
        echo view('admin\layoutadmin\footer');
    }

    public function kategori()
    {
        // Cek apakah user sudah login
        if (!session()->get('isLoggedInAdmin')) {
            return redirect()->to(base_url('loginadmin'));  // Redirect ke halaman login jika belum login
        }

        // Menampilkan Data dari database warungemak tabel daftar_menu
        $AdminKategoriModel = new AdminKategoriModel();
        $data['kategori_menu'] = $AdminKategoriModel->getAllKategori();  // Mengambil semua data menu dari database

        echo view('admin\layoutadmin\header');
        echo view('admin\layoutadmin\sidebar');
        echo view('admin\kategori\admin_kategori', $data);
        echo view('admin\layoutadmin\footer');
    }

    public function testimoni()
    {
        // Cek apakah user sudah login
        if (!session()->get('isLoggedInAdmin')) {
            return redirect()->to(base_url('loginadmin'));  // Redirect ke halaman login jika belum login
        }

        // Menampilkan Data dari database warungemak tabel daftar_menu
        $AdminTestimoniModel = new AdminTestimoniModel();
        $data['testimoni'] = $AdminTestimoniModel->getAllTestimoni();  // Mengambil semua data menu dari database

        echo view('admin\layoutadmin\header');
        echo view('admin\layoutadmin\sidebar');
        echo view('admin\testimoni\admin_testimoni', $data);
        echo view('admin\layoutadmin\footer');
    }


    public function pengguna()
    {
        // Cek apakah user sudah login
        if (!session()->get('isLoggedInAdmin')) {
            return redirect()->to(base_url('loginadmin'));  // Redirect ke halaman login jika belum login
        }

        // Menampilkan Data dari database warungemak tabel daftar_menu
        $AdminPenggunaModel = new AdminPenggunaModel();
        $data['users'] = $AdminPenggunaModel->getAllUsers();  // Mengambil semua data menu dari database

        echo view('admin\layoutadmin\header');
        echo view('admin\layoutadmin\sidebar');
        echo view('admin\pengguna\admin_pengguna', $data);
        echo view('admin\layoutadmin\footer');
    }

    public function pengiriman()
    {
        // Cek apakah user sudah login
        if (!session()->get('isLoggedInAdmin')) {
            return redirect()->to(base_url('loginadmin'));  // Redirect ke halaman login jika belum login
        }

        // Menampilkan Data dari database warungemak tabel daftar_menu
        $AdminPengirimanModel = new AdminPengirimanModel();
        $data['pengiriman'] = $AdminPengirimanModel->getAllPengiriman();  // Mengambil semua data menu dari database

        echo view('admin\layoutadmin\header');
        echo view('admin\layoutadmin\sidebar');
        echo view('admin\pengiriman\admin_pengiriman', $data);
        echo view('admin\layoutadmin\footer');
    }

    public function pesanan()
    {
        $AdminPesananModel = new AdminPesananModel();

        // Ambil data pesanan dari Model
        $data['orders'] = $AdminPesananModel->getAllPesanan();
        

        // Load view dengan layout yang ada
        echo view('admin/layoutadmin/header');
        echo view('admin/layoutadmin/sidebar');
        echo view('admin/pesanan/admin_pesanan', $data);
        echo view('admin/layoutadmin/footer');
    }



    // HAPUS DATA //
    public function hapusMenu($id_menu)
    {

        $AdminMenuModel = new AdminMenuModel();

        // Cari data menu berdasarkan ID
        $menu = $AdminMenuModel->find($id_menu);

        if ($menu) {
            // Hapus file gambar jika ada
            if (!empty($menu['gambar_menu'])) {
                $path = WRITEPATH . '../public/uploads/' . $menu['gambar_menu'];
                if (file_exists($path)) {
                    unlink($path); // Hapus file gambar
                }
            }

            // Reset AUTO_INCREMENT setelah penghapusan
            $AdminMenuModel->resetIdMenu();

            // Hapus data dari database
            $AdminMenuModel->deleteMenu($id_menu);


            // Redirect ke halaman menu dengan pesan sukses
            return redirect()->to('adminmenu')->with('success', 'Berhasil dihapus!');
        } else {
            // Redirect ke halaman menu dengan pesan error
            return redirect()->to('adminmenu')->with('error', 'Menu tidak ditemukan!');
        }
    }

    public function hapusGaleri($id_galeri)
    {

        $AdminGaleriModel = new AdminGaleriModel();

        // Cari data galeri berdasarkan ID
        $galeri = $AdminGaleriModel->find($id_galeri);

        if ($galeri) {
            // Hapus file gambar jika ada
            if (!empty($galeri['gambar_galeri'])) {
                $path = WRITEPATH . '../public/uploads/' . $galeri['gambar_galeri'];
                if (file_exists($path)) {
                    unlink($path); // Hapus file gambar
                }
            }

            // Hapus data dari database
            $AdminGaleriModel->deleteGaleri($id_galeri);

            // Redirect ke halaman galeri dengan pesan sukses
            return redirect()->to('admingaleri')->with('success', 'Berhasil dihapus!');
        } else {

            return redirect()->to('admingaleri')->with('error', 'Galeri tidak ditemukan!');
        }
    }

    public function hapusTestimoni($id_testimoni)
    {

        $AdminTestimoniModel = new AdminTestimoniModel();

        // Cari data galeri berdasarkan ID
        $testimoni = $AdminTestimoniModel->find($id_testimoni);

        if ($testimoni) {
            // Hapus file gambar jika ada
            if (!empty($testimoni['gambar_testimoni'])) {
                $path = WRITEPATH . '../public/uploads/' . $testimoni['gambar_testimoni'];
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            // Hapus data dari database
            $AdminTestimoniModel->deleteTestimoni($id_testimoni);

            // Redirect ke halaman testimoni dengan pesan sukses
            return redirect()->to('admintestimoni')->with('success', 'Berhasil dihapus!');
        } else {

            return redirect()->to('admintestimoni')->with('error', 'Galeri tidak ditemukan!');
        }
    }

    public function hapusKategori($id_kategori)
    {

        $AdminKategoriModel = new AdminKategoriModel();

        // Cari data menu berdasarkan ID
        $kategori = $AdminKategoriModel->find($id_kategori);

        if ($kategori) {

            // Reset ID
            $AdminKategoriModel->resetIdKategori();
            // Hapus data dari database
            $AdminKategoriModel->deleteKategori($id_kategori);


            // Redirect ke halaman kategori
            return redirect()->to('adminkategori')->with('success', 'Berhasil dihapus!');
        } else {

            return redirect()->to('adminkategori')->with('error', 'Menu tidak ditemukan!');
        }
    }

    public function hapusPesanan($id_order)
    {

        $AdminPesananModel = new AdminPesananModel();

        // Cari data menu berdasarkan ID
        $pesanan = $AdminPesananModel->find($id_order);

        if ($pesanan) {

            // Hapus data dari database
            $AdminPesananModel->deletePesanan($id_order);


            // Redirect ke halaman kategori
            return redirect()->to('adminpesanan')->with('success', 'Berhasil dihapus!');
        } else {

            return redirect()->to('adminpesanan')->with('error', 'Menu tidak ditemukan!');
        }
    }


    // HAPUS SEMUA DATA
    public function hapusSemuaMenu()
    {
        $db = \Config\Database::connect();

        // start
        $db->transStart();

        // Hapus semua data dari tabel yang diperlukan
        $db->table('daftar_menu')->truncate(); // select tabel

        // end
        $db->transComplete();

        // Cek status 
        if ($db->transStatus() === false) {
            // Jika gagal, tampilkan pesan error
            return redirect()->to('adminmenu')->with('error', 'Gagal menghapus semua menu!');
        } else {
            // Jika berhasil, tampilkan pesan sukses
            return redirect()->to('adminmenu')->with('success', 'Semua menu berhasil dihapus!');
        }
    }

    public function hapusSemuaGaleri()
    {
        $db = \Config\Database::connect();

        // start
        $db->transStart();

        // Hapus semua data dari tabel 
        $db->table('galeri')->truncate(); // select tabel

        // end 
        $db->transComplete();

        // Cek status 
        if ($db->transStatus() === false) {
            // Jika gagal, tampilkan pesan error
            return redirect()->to('admingaleri')->with('error', 'Gagal menghapus semua galeri!');
        } else {
            // Jika berhasil, tampilkan pesan sukses
            return redirect()->to('admingaleri')->with('success', 'Semua galeri berhasil dihapus!');
        }
    }


    public function hapusSemuaTestimoni()
    {
        $db = \Config\Database::connect();

        // start
        $db->transStart();

        // Hapus semua data dari tabel yang diperlukan
        $db->table('testimoni')->truncate(); // select tabel

        // end
        $db->transComplete();

        // Cek status
        if ($db->transStatus() === false) {
            // Jika gagal, tampilkan pesan error
            return redirect()->to('admintestimoni')->with('error', 'Gagal menghapus semua Testimoni!');
        } else {
            // Jika berhasil, tampilkan pesan sukses
            return redirect()->to('admintestimoni')->with('success', 'Semua testimoni berhasil dihapus!');
        }
    }

    // TAMBAH DATA

    
    // TAMBAH DATA MENU
    public function tambahMenu()
    {
        // Ambil data kategori dari database
        $data['kategori'] = $this->AdminKategoriModel->getAllKategori();

        // Menampilkan form tambah data
        echo view('admin/layoutadmin/header');
        echo view('admin/layoutadmin/sidebar');
        echo view('admin/menu/create_menu', $data);
        echo view('admin/layoutadmin/footer');
    }

    public function simpanTambahMenu()
    {
        // Validasi input
        $validation = $this->validate([
            'nama_menu' => 'required|string|max_length[255]',
            'deskripsi_menu' => 'required|string|max_length[500]',
            'id_kategori' => 'required|integer',
            'daftar_menu' => 'required|decimal',
            'gambar_menu' => 'uploaded[gambar_menu]|is_image[gambar_menu]|mime_in[gambar_menu,image/jpg,image/jpeg,image/png]'
        ]);

        if (!$validation) {
            // Jika validasi gagal, kembalikan ke form dengan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil file gambar
        $file = $this->request->getFile('gambar_menu');

        // Simpan file ke folder 'uploads'
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName(); // Nama file acak
            $file->move('uploads/menu', $newName); // Pindahkan file
        }

        // Data untuk disimpan ke database
        $data = [
            'nama_menu' => $this->request->getPost('nama_menu'),
            'deskripsi_menu' => $this->request->getPost('deskripsi_menu'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'harga-menu' => $this->request->getPost('harga_menu'),
            'gambar_menu' => $newName,
        ];

        // Simpan data ke database
        if ($this->AdminMenuModel->addMenu($data)) {

            // Redirect ke halaman success atau daftar menu
            return redirect()->to('adminmenu')->with('success', 'Data menu berhasil ditambahkan!');
        }

        return redirect()->back()->withInput()->with('errors', ['database' => 'Gagal menyimpan data ke database.']);
    }

    // TAMBAH DATA TESTIMONI
    public function tambahTestimoni()
    {

        // Menampilkan form tambah data
        echo view('admin/layoutadmin/header');
        echo view('admin/layoutadmin/sidebar');
        echo view('admin/testimoni/create_testimoni');
        echo view('admin/layoutadmin/footer');
    }

    public function simpanTambahTestimoni()
    {
        // Validasi input
        $validation = $this->validate([
            'gambar_testimoni' => 'uploaded[gambar_testimoni]|is_image[gambar_testimoni]|mime_in[gambar_testimoni,image/jpg,image/jpeg,image/png]',
            'nama_pelanggan_testimoni' => 'required|string|max_length[255]'
        ]);

        if (!$validation) {
            // Jika validasi gagal, kembalikan ke form dengan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil file gambar
        $file = $this->request->getFile('gambar_testimoni');

        // Simpan file ke folder 'uploads'
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName(); // Nama file acak
            $file->move('uploads/testimoni', $newName); // Pindahkan file
        }

        // Data untuk disimpan ke database
        $data = [
            'gambar_testimoni' => $newName,
            'nama_pelanggan_testimoni' => $this->request->getPost('nama_pelanggan_testimoni'),
        ];

        // Simpan data ke database
        if ($this->AdminTestimoniModel->addTestimoni($data)) {

            // Redirect ke halaman success atau daftar menu
            return redirect()->to('admintestimoni')->with('success', 'Data menu berhasil ditambahkan!');
        }

        return redirect()->back()->withInput()->with('errors', ['database' => 'Gagal menyimpan data ke database.']);
    }

    // TAMBAH Galeri
    public function tambahGaleri()
    {

        // Menampilkan form tambah data
        echo view('admin/layoutadmin/header');
        echo view('admin/layoutadmin/sidebar');
        echo view('admin/galeri/create_galeri');
        echo view('admin/layoutadmin/footer');
    }

    public function simpanTambahGaleri()
    {
        // Validasi input
        $validation = $this->validate([
            'gambar_galeri' => 'uploaded[gambar_galeri]|is_image[gambar_galeri]|mime_in[gambar_galeri,image/jpg,image/jpeg,image/png]'
        ]);

        if (!$validation) {
            // Jika validasi gagal, kembalikan ke form dengan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil file gambar
        $file = $this->request->getFile('gambar_galeri');

        // Simpan file ke folder 'uploads'
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName(); // Nama file acak
            $file->move('uploads/galeri', $newName); // Pindahkan file
        }

        // Data untuk disimpan ke database
        $data = [
            'gambar_galeri' => $newName,
        ];

        // Simpan data ke database
        if ($this->AdminGaleriModel->addGaleri($data)) {

            // Redirect ke halaman success atau daftar menu
            return redirect()->to('admingaleri')->with('success', 'Data menu berhasil ditambahkan!');
        }

        return redirect()->back()->withInput()->with('errors', ['database' => 'Gagal menyimpan data ke database.']);
    }

    // TAMBAH DATA KATEGORI
    public function tambahKategori()
    {

        // Menampilkan form tambah data
        echo view('admin/layoutadmin/header');
        echo view('admin/layoutadmin/sidebar');
        echo view('admin/kategori/create_kategori');
        echo view('admin/layoutadmin/footer');
    }

    public function simpanTambahKategori()
    {
        // Validasi input
        $validation = $this->validate([
            'nama_kategori' => 'required|string|max_length[255]',
            'deskripsi_kategori' => 'required|string|max_length[255]'
        ]);

        if (!$validation) {
            // Jika validasi gagal, kembalikan ke form dengan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Data untuk disimpan ke database
        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'deskripsi_kategori' => $this->request->getPost('deskripsi_kategori'),
        ];

        // Simpan data ke database
        if ($this->AdminKategoriModel->addKategori($data)) {

            // Redirect ke halaman success atau daftar menu
            return redirect()->to('adminkategori')->with('success', 'Data menu berhasil ditambahkan!');
        }

        return redirect()->back()->withInput()->with('errors', ['database' => 'Gagal menyimpan data ke database.']);
    }

    // EDIT DATA

    // EDIT KETEGORI

    public function updateKategori($id_kategori)
    {
        // Load model
        $adminKategoriModel = new AdminKategoriModel();

        // Ambil data kategori berdasarkan ID
        $kategori = $adminKategoriModel->find($id_kategori);

        // Jika kategori tidak ditemukan, arahkan kembali ke daftar kategori dengan pesan error
        if (!$kategori) {
            return redirect()->to(base_url('adminkategori'))->with('error', 'Kategori tidak ditemukan.');
        }

        // Kirim data kategori ke view
        echo view('admin/layoutadmin/header');
        echo view('admin/layoutadmin/sidebar');
        echo view('admin/kategori/edit_kategori', ['kategori' => $kategori]);
        echo view('admin/layoutadmin/footer');
    }

    // Fungsi untuk menyimpan perubahan kategori
    public function simpanUpdateKategori($id_kategori)
    {
        // Validasi input
        $validation = $this->validate([
            'nama_kategori' => 'required|max_length[255]',
            'deskripsi_kategori' => 'required|max_length[500]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Load model
        $AdminKategoriModel = new AdminKategoriModel();

        // Ambil data kategori yang akan diperbarui
        $kategori = $AdminKategoriModel->find($id_kategori);

        // Jika kategori tidak ditemukan, kembalikan ke daftar kategori
        if (!$kategori) {
            return redirect()->to(base_url('adminkategori'))->with('error', 'Kategori tidak ditemukan.');
        }

        // Siapkan data untuk update
        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'deskripsi_kategori' => $this->request->getPost('deskripsi_kategori'),
        ];

        // Lakukan update
        $AdminKategoriModel->update($id_kategori, $data);

        return redirect()->to(base_url('adminkategori'))->with('success', 'Kategori berhasil diperbarui.');
    }

    // EDIT MENU
    public function updateMenu($id_menu)
    {
        // Load model
        $AdminMenuModel = new AdminMenuModel();
        $AdminKategoriModel = new AdminKategoriModel();

        // Ambil data menu yang akan diedit
        $daftar_menu = $AdminMenuModel->find($id_menu);
        if (!$daftar_menu) {
            return redirect()->to('adminmenu')->with('error', 'Menu tidak ditemukan.');
        }

        // Ambil daftar kategori untuk dropdown
        $kategori = $AdminKategoriModel->getAllKategori();

        // Kirim data ke view
        echo view('admin/layoutadmin/header');
        echo view('admin/layoutadmin/sidebar');
        echo view('admin/menu/edit_menu', ['menu' => $daftar_menu, 'kategori' => $kategori]);
        echo view('admin/layoutadmin/footer');
    }

    // Fungsi untuk menyimpan perubahan kategori
    public function simpanUpdateMenu($id_menu)
    {
        // Validasi input
        $validation = $this->validate([
            'nama_menu' => 'required|string|max_length[255]',
            'deskripsi_menu' => 'required|string|max_length[500]',
            'id_kategori' => 'required|integer',
            'harga_menu' => 'required|decimal',
            // Hapus validasi gambar_menu, karena tidak wajib
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Load model
        $AdminMenuModel = new AdminMenuModel();

        // Ambil data menu yang akan diperbarui
        $daftar_menu = $AdminMenuModel->find($id_menu);

        // Jika menu tidak ditemukan, kembalikan ke daftar menu
        if (!$daftar_menu) {
            return redirect()->to(base_url('adminmenu'))->with('error', 'Menu tidak ditemukan.');
        }

        // Ambil file gambar (jika ada)
        $file = $this->request->getFile('gambar_menu');
        $newName = $daftar_menu['gambar_menu']; // Menggunakan gambar lama jika tidak ada gambar baru

        // Jika ada gambar baru yang diunggah
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Hapus gambar lama (jika ada)
            if ($daftar_menu['gambar_menu'] && file_exists('uploads/menu/' . $daftar_menu['gambar_menu'])) {
                unlink('uploads/menu/' . $daftar_menu['gambar_menu']);
            }

            // Simpan gambar baru
            $newName = $file->getRandomName(); // Nama file acak
            $file->move('uploads/menu', $newName); // Pindahkan file ke folder 'uploads/menu'
        }

        // Siapkan data untuk update
        $data = [
            'nama_menu' => $this->request->getPost('nama_menu'),
            'deskripsi_menu' => $this->request->getPost('deskripsi_menu'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'harga_menu' => $this->request->getPost('harga_menu'),
            'gambar_menu' => $newName, // Gunakan gambar baru atau yang lama
        ];

        // Lakukan update
        $AdminMenuModel->update($id_menu, $data);

        return redirect()->to(base_url('adminmenu'))->with('success', 'Menu berhasil diperbarui.');
    }


    // DETAIL //
    public function detailpengguna($id_users)
    {
        // Membuat instance model untuk mengambil data menu berdasarkan ID
        $AdminPenggunaModel = new AdminPenggunaModel();

        // Menyaring menu berdasarkan ID yang diterima dari URL
        $users = $AdminPenggunaModel->find($id_users);

        // Jika menu ditemukan
        if ($users) {
            // Menampilkan view 
            echo view('admin/layoutadmin/header');
            echo view('admin/layoutadmin/sidebar');
            echo view('admin/pengguna/detail_pengguna', ['user' => $users]);
            echo view('admin/layoutadmin/footer');
        } else {
            // Jika menu tidak ditemukan, redirect ke halaman utama atau tampilkan error
            return redirect()->to('adminpengguna')->with('error', 'Pengguna tidak ditemukan.');
        }
    }

    public function admindetailpesanan($id_order)
    {
        $AdminPesananModel = new AdminPesananModel();
        $AdminOrderItemsModel = new AdminOrderItemsModel();

        // Ambil data pesanan dari model
        $data['order'] = $AdminPesananModel->getOrderById($id_order); 

        // Ambil data item pesanan dari model
        $data['order_items'] = $AdminOrderItemsModel->getOrderItemsByOrderId($id_order);

        echo view('admin/layoutadmin/header');
        echo view('admin/layoutadmin/sidebar');
        echo view('admin/pesanan/detail_pesanan', $data); // tampilan untuk detail pesanan
        echo view('admin/layoutadmin/footer');
    }

    
}
