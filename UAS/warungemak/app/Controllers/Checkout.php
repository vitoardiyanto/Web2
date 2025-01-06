<?php

namespace App\Controllers;

// Mengimpor model MenuModel
use App\Models\Pages\MenuModel;
use App\Models\Pages\KeranjangModel;
use App\Models\OrdersModel;
use App\Models\OrderItemsModel;
use App\Models\WilayahModel;
use App\Models\Users\LoginUsersModel;

class Checkout extends BaseController
{
    protected $keranjangModel;
    protected $menuModel;
    protected $ordersModel;
    protected $orderItemsModel;
    protected $wilayahModel;
    protected $LoginUsersModel;

    public function __construct()
    {
        $this->keranjangModel = new KeranjangModel();
        $this->menuModel = new MenuModel();
        $this->ordersModel = new OrdersModel();
        $this->orderItemsModel = new OrderItemsModel();
        $this->wilayahModel = new WilayahModel();  // Model untuk wilayah
        $this->LoginUsersModel = new LoginUsersModel();
    }

    // Fungsi untuk menampilkan halaman checkout
    public function checkout()
    {
        // Cek apakah user sudah login
        if (!session()->get('isLoggedInUser')) {
            session()->setFlashdata('error', 'Anda belum login!');
            return redirect()->to(base_url('login'));
        }

        // Ambil item keranjang berdasarkan user
        $id_users = session('id_users');
        $ItemsKeranjang = $this->keranjangModel->getKeranjangByUsers($id_users);
        $totalHarga = 0;

        foreach ($ItemsKeranjang as &$item) {
            $item['harga'] = $this->menuModel->getHargaMenu($item['id_menu']);
            $totalHarga += $item['quantity'] * $item['harga'];
        }

        // Ambil data wilayah untuk ongkos kirim
        $wilayahList = $this->wilayahModel->findAll();

        $currentUri = service('uri')->getSegment(1);

        $data['currentUri'] = $currentUri;

        // Tampilkan halaman checkout
        echo view('layout/header');
        echo view('layout/navbar', $data);
        echo view('pages/checkout', [
            'ItemsKeranjang' => $ItemsKeranjang,
            'totalHarga' => $totalHarga,
            'wilayahList' => $wilayahList  // Mengirimkan data wilayah
        ]);
        echo view('layout/footer');
    }

    // Fungsi untuk memproses pesanan (checkout)
    public function processCheckout()
    {
        // Cek apakah user sudah login
        if (!session()->get('isLoggedInUser')) {
            session()->setFlashdata('error', 'Anda belum login!');
            return redirect()->to(base_url('login'));
        }

        $id_users = session('id_users');

        // Ambil data user dari database
        $user = $this->LoginUsersModel->find($id_users); // Gunakan model untuk query user

        // Jika user tidak ditemukan, beri error
        if (!$user) {
            session()->setFlashdata('error', 'User tidak ditemukan.');
            return redirect()->to(base_url('login'));
        }

        // Ambil nama dan data user
        $nama = $user['nama'];
        $email = $user['email'];
        $nomor_hp = $user['nomor_hp'];

        // Ambil data dari form (alamat pengiriman, dll)
        $alamat = $this->request->getPost('alamat');
        $jenis_pengiriman = $this->request->getPost('jenis_pengiriman');
        $id_wilayah = $this->request->getPost('id_wilayah');
        $catatan = $this->request->getPost('catatan');
        $tgl_pesanansiap = $this->request->getPost('tgl_pesanansiap');
        $id_users = session('id_users');

        // Jika pengiriman diantar, ambil ongkos kirim dari wilayah yang dipilih
        $ongkos_kirim = 0;
        if ($jenis_pengiriman == 'diantar') {
            $wilayah = $this->wilayahModel->find($id_wilayah);
            $ongkos_kirim = $wilayah ? $wilayah['tarif_ongkir'] : 0;
        }

        // Ambil item keranjang
        $ItemsKeranjang = $this->keranjangModel->getKeranjangByUsers($id_users);
        $totalHarga = 0;

        foreach ($ItemsKeranjang as $item) {
            $totalHarga += $item['quantity'] * $this->menuModel->getHargaMenu($item['id_menu']);
        }

        // Set Midtrans configuration
        \Midtrans\Config::$serverKey = 'SB-Mid-server-osST89bTb7nqtlaitMNMmadN'; // Ganti dengan serverKey Anda
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Transaction params
        $params = array(
            'transaction_details' => array(
                'order_id' => 'order-' . time(),  // Order ID harus unik
                'gross_amount' => $totalHarga + $ongkos_kirim,  // Total Harga + Ongkir
            ),
            'customer_details' => array(
                'first_name' => $nama,
                'last_name' => '',  // Anda bisa ganti sesuai data pemesan
                'email' => $email,
                'phone' => $nomor_hp,
            ),
        );

        // Get Snap token from Midtrans API
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Simpan data pesanan ke database
        $this->ordersModel->save([
            'id_users' => $id_users,
            'total_harga' => $totalHarga + $ongkos_kirim,  // Total harga + ongkir
            'status_order' => 'pending',
            'alamat' => $alamat,
            'token' => $snapToken, // Simpan token Snap untuk proses pembayaran
            'tanggal_order' => date('Y-m-d H:i:s'),
            'jenis_pengiriman' => $jenis_pengiriman,
            'id_wilayah' => $id_wilayah,
            'tgl_pesanansiap' => $tgl_pesanansiap,
            'ongkos_kirim' => $ongkos_kirim,
            'catatan' => $catatan,
        ]);

        $id_order = $this->ordersModel->getInsertID(); // Ambil ID pesanan yang baru disimpan

        // Simpan menu yang dipilih dan kuantitas ke tabel order_items
        foreach ($ItemsKeranjang as $item) {
            $this->orderItemsModel->save([
                'id_order' => $id_order,
                'id_menu' => $item['id_menu'],
                'quantity' => $item['quantity']
            ]);
        }

        // Bersihkan keranjang setelah checkout selesai
        $this->keranjangModel->hapusKeranjangByUser($id_users);

        // Redirect ke halaman pembayaran
        session()->setFlashdata('success', 'Pesanan Anda berhasil diproses! Silakan selesaikan pembayaran.');
        return redirect()->to('https://app.sandbox.midtrans.com/snap/v2/vtweb/' . $snapToken);  // Mengarahkan pengguna ke halaman pembayaran Midtrans
    }
}
