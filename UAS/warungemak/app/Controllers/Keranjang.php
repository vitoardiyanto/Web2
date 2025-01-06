<?php

namespace App\Controllers;

// Mengimpor model MenuModel
use App\Models\Pages\MenuModel;
use App\Models\Pages\KeranjangModel;

class Keranjang extends BaseController
{
    // KERANJANG
    public function TambahKeranjang()
    {
        // Pastikan pengguna login
        if (!session('isLoggedInUser')) {
            return redirect()->to('login')->with('error', 'Silakan login untuk menambahkan ke keranjang');
        }
        $KeranjangModel = new KeranjangModel();

        // Ambil data dari form atau request
        $id_users = session('id_users'); // ID user dari session
        $id_menu = $this->request->getVar('id_menu'); // ID produk
        $quantity = $this->request->getVar('quantity') ?? 1; // Jumlah, default 1

        $existingItem = $KeranjangModel->where(['id_users' => $id_users, 'id_menu' => $id_menu])->first();

        // Periksa apakah produk sudah ada di keranjang
        if ($existingItem) {
            // Jika sudah ada, tambahkan jumlahnya
            $newQuantity = $existingItem['quantity'] + $quantity; // Menghitung total kuantitas baru
            $KeranjangModel->update($existingItem['id_keranjang'], ['quantity' => $newQuantity]);

            // Mengembalikan status berhasil
            return redirect()->back()->with('success', 'Jumlah Item Berhasil Ditambahkan!');
        } else {
            // Jika belum ada, tambahkan item baru
            $KeranjangModel->save([
                'id_users' => $id_users,
                'id_menu' => $id_menu,
                'quantity' => $quantity
            ]);

            return redirect()->back()->with('success', 'Pesanan Berhasil Ditambahkan ke Keranjang!');
        }
    }

    public function keranjang()
    {
        // Cek apakah user sudah login
        if (!session()->get('isLoggedInUser')) {
            session()->setFlashdata('error', 'Anda Belum Login');
            return redirect()->to(base_url('login'));  // Redirect ke halaman login jika belum login
        }

        $menuModel = new MenuModel();
        $KeranjangModel = new KeranjangModel();


        $id_users = session('id_users');

        $ItemsKeranjang = $KeranjangModel->getKeranjangByUsers($id_users);


        foreach ($ItemsKeranjang as &$item) {
            $item['harga'] = $menuModel->getHargaMenu($item['id_menu']);  // Menambahkan harga ke item
        }

        $currentUri = service('uri')->getSegment(1);

        $data['currentUri'] = $currentUri;

        echo view('layout\header');
        echo view('layout\navbar', $data);
        echo view('pages\keranjang', ['ItemsKeranjang' => $ItemsKeranjang]);
        echo view('layout\footer');
    }

    protected $keranjangModel;

    public function __construct()
    {
        $this->keranjangModel = new KeranjangModel();
    }

    // Fungsi tambah quantity
    public function tambahQuantity($id_keranjang)
    {
        $keranjang = $this->keranjangModel->find($id_keranjang);

        if ($keranjang) {
            // Tambahkan quantity +1
            $this->keranjangModel->update($id_keranjang, [
                'quantity' => $keranjang['quantity'] + 1
            ]);
            return redirect()->back()->with('success', 'Quantity berhasil ditambahkan.');
        }

        return redirect()->back()->with('error', 'Item tidak ditemukan.');
    }

    // Fungsi kurangi quantity
    public function kurangiQuantity($id_keranjang)
    {
        $keranjang = $this->keranjangModel->find($id_keranjang);

        if ($keranjang) {
            // Cek quantity minimal (tidak boleh kurang dari 1)
            if ($keranjang['quantity'] > 1) {
                $this->keranjangModel->update($id_keranjang, [
                    'quantity' => $keranjang['quantity'] - 1
                ]);
                return redirect()->back()->with('success', 'Quantity berhasil dikurangi.');
            } else {
                // Jika quantity 1, bisa hapus atau berikan pesan
                return redirect()->back()->with('error', 'Quantity tidak boleh kurang dari 1.');
            }
        }

        return redirect()->back()->with('error', 'Item tidak ditemukan.');
    }

    //FUNGSI HAPUS KERANJANG

    public function hapuskeranjang($id_keranjang)
    {
        $KeranjangModel = new KeranjangModel();

        // Cari item berdasarkan id_keranjang
        $item = $KeranjangModel->find($id_keranjang);

        // Cek apakah item ditemukan
        // Hapus item dari keranjang
        $KeranjangModel->delete($id_keranjang);


        // Jika item tidak ditemukan, redirect dengan error
        return redirect()->to('keranjang');
    }
}
