<?php

use App\Controllers\User;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// $routes->get('/home', 'Login::index');
// $routes->get('/spm', 'Spm::index');
$routes->post('upload', 'UploadController::uploadGambar');
$routes->get('user/email', 'User::email');


$routes->get('/', 'CekSession::cek');
$routes->get('/login', 'Login::login');
$routes->post('/login/auth', 'Login::auth');
$routes->post('/login/keluar', 'Login::keluar');
// halaman routes user
$routes->get('/user', 'User::dashboard', ['filter' => 'auth']);
$routes->get('/user/dashboard', 'User::dashboard', ['filter' => 'auth']);
$routes->get('/user/review', 'User::review', ['filter' => 'auth']);
$routes->get('/user/revision', 'User::revision', ['filter' => 'auth']);
$routes->get('/user/tambah_temuan', 'User::tambah_temuan', ['filter' => 'auth']);
$routes->post('/user/tambah_temuan', 'User::tambah_temuan', ['filter' => 'auth']);
$routes->get('/user/layout/page_layout', 'User::page_layout', ['filter' => 'auth']);
$routes->get('/user/cekdb', 'User::cekdb', ['filter' => 'auth']);
$routes->get('/user/ajax', 'User::ajax', ['filter' => 'auth']);
$routes->post('/user/indikator', 'User::indikator', ['filter' => 'auth']);
$routes->post('/user/subindikator', 'User::subindikator', ['filter' => 'auth']);
$routes->add('/user/detail_ais/(:segment)', 'User::detail_ais/$1', ['filter' => 'auth']);
$routes->add('/user/update_50/(:num)', 'User::update_50/$1', ['filter' => 'auth']);
$routes->add('/user/update_100/(:num)', 'User::update_100/$1', ['filter' => 'auth']);



// halaman routes admin
$routes->get('/admin', 'Admin::dashboard', ['filter' => 'auth']);
$routes->get('/admin/utilitas/mitra', 'Admin::mitra', ['filter' => 'auth']);
$routes->get('/admin/utilitas/tambah_mitra', 'Admin::tambah_mitra', ['filter' => 'auth']);
$routes->post('/admin/tambah_mitra', 'Admin::tambah_mitra', ['filter' => 'auth']);
$routes->get('/admin/hapus_mitra', 'Admin::hapus_mitra', ['filter' => 'auth']);
$routes->delete('admin/hapus_mitra/(:num)', 'Admin::hapus_mitra/$1', ['filter' => 'auth']);
$routes->get('/admin/utilitas/kategori', 'Admin::kategori', ['filter' => 'auth']);
$routes->post('admin/tambah_kategori', 'Admin::tambah_kategori');
$routes->delete('admin/hapus_kategori/(:num)', 'Admin::hapus_kategori/$1', ['filter' => 'auth']);
$routes->get('/admin/utilitas/indikator', 'Admin::indikator', ['filter' => 'auth']);
$routes->post('/admin/tambah_indikator', 'Admin::tambah_indikator', ['filter' => 'auth']);
$routes->delete('/admin/hapus_indikator/(:num)', 'Admin::hapus_indikator/$1', ['filter' => 'auth']);
$routes->get('/admin/utilitas/subindikator', 'Admin::subindikator', ['filter' => 'auth']);
$routes->post('admin/tambah_subindikator', 'Admin::tambah_subindikator', ['filter' => 'auth']);
$routes->delete('admin/hapus_subindikator/(:num)', 'Admin::hapus_subindikator/$1', ['filter' => 'auth']);
$routes->get('/admin/utilitas/akun', 'Admin::akun', ['filter' => 'auth']);
$routes->post('/admin/tambah_akun', 'Admin::tambah_akun', ['filter' => 'auth']);
$routes->delete('/admin/hapus_akun/(:num)', 'Admin::hapus_akun/$1', ['filter' => 'auth']);
$routes->get('/admin/utilitas/role', 'Admin::role', ['filter' => 'auth']);

$routes->get('/admin/mitra_ais', 'Admin::mitra_ais', ['filter' => 'auth']);
$routes->get('/admin/mitra_db', 'Admin::mitra_db');

// $routes->get('/user/create_spm', 'User::create_spm');
$routes->add('/user/create_spm', 'User::create_spm', ['filter' => 'auth']);
$routes->add('/user/proses', 'User::proses', ['filter' => 'auth']);

//API
$routes->resource('api/user/show', ['controller' => 'Api\User']);
