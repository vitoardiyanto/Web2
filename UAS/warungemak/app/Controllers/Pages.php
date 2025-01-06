<?php

namespace App\Controllers;

// Mengimpor model MenuModel

use App\Models\OrdersModel;
use App\Models\OrderItemsModel;
use App\Models\Pages\MenuModel;
use App\Models\Pages\TestimoniModel;
use App\Models\Pages\GaleriModel;

class Pages extends BaseController
{
    public function home()
    {
        $currentUri = service('uri')->getSegment(1);
        $data['currentUri'] = $currentUri;

        echo view('layout\header');
        echo view('layout\navbar', $data);
        echo view('pages\home');
        echo view('layout\footer');
    }

    public function about()
    {
        $currentUri = service('uri')->getSegment(1);
        $data['currentUri'] = $currentUri;

        echo view('layout\header');
        echo view('layout\navbar', $data);
        echo view('pages\about');
        echo view('layout\footer');
    }

    public function menu()
    {
        // Mendapatkan Segmen URI
        $currentUri = service('uri')->getSegment(1);

        // Menampilkan Data dari database warungemak tabel daftar_menu
        $menuModel = new MenuModel();
        $data['daftar_menu'] = $menuModel->getMenuDenganKategori();  // Mengambil semua data menu dari database

        // Mengelompokkan menu berdasarkan kategori
        $menu_berdasarkan_kategori = [];
        foreach ($data['daftar_menu'] as $menu) {
            $menu_berdasarkan_kategori[$menu['nama_kategori']][] = $menu;
        }

        // Menyusun data untuk dikirimkan ke view
        $data['menu_berdasarkan_kategori'] = $menu_berdasarkan_kategori;
        $data['currentUri'] = $currentUri;

        // Mengirim data ke tampilan menu
        echo view('layout\header');
        echo view('layout\navbar', $data);
        echo view('pages\menu', $data);
        echo view('layout\footer');
    }

    public function testimoni()
    {
        $currentUri = service('uri')->getSegment(1);

        $testimoniModel = new TestimoniModel();
        $data['testimoni'] = $testimoniModel->getAllTestimoni();

        $data['currentUri'] = $currentUri;

        echo view('layout\header');
        echo view('layout\navbar', $data);
        echo view('pages\testimoni');
        echo view('layout\footer');
    }

    public function galeri()
    {
        $currentUri = service('uri')->getSegment(1);

        $galeriModel = new GaleriModel();
        $data['galeri'] = $galeriModel->getAllGaleri();

        $data['currentUri'] = $currentUri;

        echo view('layout\header');
        echo view('layout\navbar', $data);
        echo view('pages\galeri');
        echo view('layout\footer');
    }

    // DETAIL MENU
    public function detailMenu($id)
    {
        $currentUri = service('uri')->getSegment(1);
        $data['currentUri'] = $currentUri;

        // Membuat instance model untuk mengambil data menu berdasarkan ID
        $menuModel = new MenuModel();

        // Menyaring menu berdasarkan ID yang diterima dari URL
        $menu = $menuModel->find($id);

        // Jika menu ditemukan
        if ($menu) {
            // Menampilkan view 
            echo view('layout/header');
            echo view('layout/navbar', $data);
            echo view('pages/detailmenu', ['menu' => $menu]);
            echo view('layout/footer');
        } else {
            // Jika menu tidak ditemukan, redirect ke halaman utama atau tampilkan error
            return redirect()->to('menu')->with('error', 'Menu tidak ditemukan.');
        }
    }

    public function pesanan()
    {
        // Ambil ID pengguna dari session (ID pengguna yang sedang login)
        $userId = session()->get('id_users');

        // Cek apakah pengguna sudah login
        if (!$userId) {
            return redirect()->to(base_url('login'))->with('error', 'You must be logged in to view your orders');
        }

        // Inisialisasi model
        $ordersModel = new OrdersModel();
        $orderItemsModel = new OrderItemsModel();

        // Ambil semua pesanan yang berkaitan dengan ID pengguna yang sedang login
        // Menggunakan method getOrdersByUser untuk mengambil pesanan oleh user
        $orders = $ordersModel->getPesananByUser($userId);

        // Inisialisasi array untuk menampung detail pesanan
        $orderDetails = [];

        // Loop untuk mengambil detail pesanan per order
        foreach ($orders as $order) {
            $orderItems = $orderItemsModel->getOrderItemsByOrder($order['id_order']);

            // Gabungkan data pesanan dan item pesanan ke dalam array
            $orderDetails[] = [
                'order' => $order,
                'items' => $orderItems
            ];
        }

        $currentUri = service('uri')->getSegment(1);
        $data['currentUri'] = $currentUri;

        // Kirim data pesanan dan detail item pesanan ke view
        echo view('layout/header');
        echo view('layout/navbar', $data);
        echo view('pages/pesanan', ['orders' => $orderDetails]);
        echo view('layout/footer');
    }
}
