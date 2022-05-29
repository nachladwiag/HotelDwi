<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::home_tamu');
$routes->get('/Kamar', 'Home::kamar');
$routes->get('/hotel', 'Home::hotel');
$routes->get('/Reservasi', 'Home::reservasi');
$routes->post('/Reservasi/simpan', 'Home::simpanreservasi');
$routes->get('/admin', 'PetugasController::index');
$routes->get('/resepsionis', 'PetugasController::index');
$routes->post('/petugas/login', 'PetugasController::login');
$routes->get('/logout', 'PetugasController::logout');
$routes->get('/petugas/dashboard','PetugasController::dashboardPetugas',['filter'=>'otentifikasi']);
$routes->get('/resepsionis/dashboard','PetugasController::dashboardPetugas',['filter'=>'otentifikasi']);
$routes->get('/inv/(:num)', 'ReservasiController::invoice/$1');

// Untuk memesan kamar
$routes->get('/pemesanan', 'Home::reservasi');
$routes->post('/simpan-pemesanan', 'Home::simpanreservasi');

//route CRUD Kamar
$routes->get('/kamar', 'PetugasController::tampilKamar');
$routes->get('/kamar/tambah', 'PetugasController::tambahKamar');
$routes->post('/kamar/simpan', 'PetugasController::simpanKamar');
$routes->get('/kamar/edit/(:any)', 'PetugasController::editKamar/$1');
$routes->get('/kamar/foto/edit(:num)', 'PetugasController::editFoto/$1');
$routes->post('/kamar/update', 'PetugasController::updateKamar');
$routes->post('/kamar/updatefoto', 'PetugasController::updateFoto');
$routes->get('/kamar/hapus/(:any)', 'PetugasController::hapusKamar/$1');

//route CRUD fasilitas kamar
$routes->get('/fasilitas-kamar', 'FasilitasKamarController::tampil');
$routes->get('/fasilitas-kamar/tambah', 'FasilitasKamarController::tambahFasilitas');
$routes->post('/fasilitas/simpan', 'FasilitasKamarController::simpanFasilitas');
$routes->get('/Fasilitas/edit-FasilitasKamar/(:any)', 'FasilitaskamarController::editFasilitasKamar/$1');
$routes->post('/fasilitas-kamar/update', 'FasilitasKamarController::updatefasilitaskamar');
$routes->get('/Fasilitas/hapus/(:num)', 'FasilitasKamarController::hapus/$1');

//route CRUD fasilitas hotel
$routes->get('/fasilitas_hotel', 'FasilitasHotelController::tampil');
$routes->get('/fasilitas_hotel/tambah', 'FasilitasHotelController::tambahFasilitas');
$routes->post('/fasilitas_hotel/simpan', 'FasilitashotelController::simpanFasilitas');
$routes->get('/fasilitas_hotel/edit/(:num)', 'FasilitashotelController::editfasilitashotel/$1');
$routes->post('/fasilitas_hotel/update', 'FasilitashotelController::updateFasilitashotel');
$routes->get('/fasilitas_hotel/hapus/(:num)', 'FasilitashotelController::hapusfasilitashotel/$1');

// route Reservasi Petugas
$routes->get('/reservasi', 'ReservasiController::index',['filter'=>'otentifikasi']);
$routes->post('/reservasi', 'ReservasiController::index',['filter'=>'otentifikasi']);
$routes->get('/reservasi/in/(:num)', 'ReservasiController::in/$1');
$routes->get('/reservasi/out/(:num)', 'ReservasiController::out/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
