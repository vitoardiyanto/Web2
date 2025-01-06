<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('home');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

// Untuk Mengarahkan URL Ke Method Controller Pages untuk ditampilkan di views

//Untuk Tampilan Web
$routes->get('about', 'Pages::about');
$routes->get('menu', 'Pages::menu');
$routes->get('home', 'Pages::home');
$routes->get('testimoni', 'Pages::testimoni');
$routes->get('galeri', 'Pages::galeri');
$routes->get('pesanan', 'Pages::pesanan');
$routes->get('detailmenu/(:num)', 'Pages::detailMenu/$1');



// Untuk Tampilan Admin
$routes->get('admin', 'Admin::admin');
$routes->get('adminmenu', 'Admin::menu');
$routes->get('admingaleri', 'Admin::galeri');
$routes->get('adminkategori', 'Admin::kategori');
$routes->get('admintestimoni', 'Admin::testimoni');
$routes->get('adminpesanan', 'Admin::pesanan');
$routes->get('adminpengguna', 'Admin::pengguna');
$routes->get('adminpengiriman', 'Admin::pengiriman');
$routes->get('admin/getStats', 'Admin::getStatsAdmin');

// Untuk Detail
$routes->get('admindetailpengguna/(:num)', 'Admin::detailpengguna/$1');
$routes->get('admindetailpesanan/(:num)', 'Admin::admindetailpesanan/$1');

// Untuk Hapus Salah Satu Data dari tabel
$routes->get('hapusMenu/(:num)', 'Admin::hapusMenu/$1');
$routes->get('hapusGaleri/(:num)', 'Admin::hapusGaleri/$1');
$routes->get('hapusTestimoni/(:num)', 'Admin::hapusTestimoni/$1');
$routes->get('hapusKategori/(:num)', 'Admin::hapusKategori/$1');
$routes->get('hapusPesanan/(:num)', 'Admin::hapusPesanan/$1');
$routes->get('hapusPengguna/(:num)', 'Admin::hapusPengguna/$1');
$routes->get('hapusPengiriman/(:num)', 'Admin::hapusPengiriman/$1');


// Untuk Hapus Semua Data dari tabel
$routes->post('hapusSemuaMenu', 'Admin::hapusSemuaMenu');
$routes->post('hapusSemuaGaleri', 'Admin::hapusSemuaGaleri');
$routes->post('hapusSemuaTestimoni', 'Admin::hapusSemuaTestimoni');


// Untuk Menambah data 
$routes->post('simpanTambahMenu', 'Admin::simpanTambahMenu');
$routes->get('tambahMenu', 'Admin::tambahMenu');

$routes->post('simpanTambahTestimoni', 'Admin::simpanTambahTestimoni');
$routes->get('tambahTestimoni', 'Admin::tambahTestimoni');

$routes->post('simpanTambahGaleri', 'Admin::simpanTambahGaleri');
$routes->get('tambahGaleri', 'Admin::tambahGaleri');

$routes->post('simpanTambahKategori', 'Admin::simpanTambahKategori');
$routes->get('tambahKategori', 'Admin::tambahKategori');


// Untuk Edit data
$routes->get('updateKategori/(:num)', 'Admin::updateKategori/$1');
$routes->post('simpanUpdateKategori/(:num)', 'Admin::simpanUpdateKategori/$1');

$routes->get('updateMenu/(:num)', 'Admin::updateMenu/$1');
$routes->post('simpanUpdateMenu/(:num)', 'Admin::simpanUpdateMenu/$1');

// Keranjang
$routes->post('tambahkeranjang', 'Keranjang::TambahKeranjang');
$routes->get('keranjang', 'Keranjang::keranjang');

$routes->get('keranjang/tambah/(:num)', 'Keranjang::tambahQuantity/$1');
$routes->get('keranjang/kurangi/(:num)', 'Keranjang::kurangiQuantity/$1');
$routes->post('keranjang/hapus/(:num)', 'Keranjang::hapuskeranjang/$1');

//CHECKOUT
$routes->get('checkout', 'Checkout::checkout');

// Login dkk, USER
$routes->get('login', 'UsersLogin::loginUsers');
$routes->post('loginusers/authenticate', 'UsersLogin::authenticate');
$routes->post('registerusers/daftaruser', 'UsersLogin::daftaruser');
$routes->get('register', 'UsersLogin::registerUsers');
$routes->get('forgot', 'UsersLogin::forgotUsers');
$routes->get('logoutusers', 'UsersLogin::logoutusers');  // Route untuk logout

//Login dkk, ADMIN
$routes->get('loginadmin', 'AdminLogin::LoginAdmin');
$routes->post('login/authenticate', 'AdminLogin::authenticate');
$routes->get('logout', 'AdminLogin::logout');  // Route untuk logout

$routes->get('index', 'PaymentController::index');




