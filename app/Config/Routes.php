<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');

$routes->group('dashboard', ['filter' => 'login'], function ($routes) {
	$routes->add('/', 'Dashboard::index');
});

$routes->group('view', ['filter' => 'manager'], function ($routes) {
	$routes->add('pemasukan/(:any)', 'Pemasukan::index/$1');
	$routes->add('pemasukan-excel/(:any)', 'Pemasukan::d_excel/$1');
	$routes->add('pengeluaran-list/(:any)', 'Pengeluaran::bulan_ini/$1');
	$routes->add('pengeluaran-excel/(:any)', 'Pengeluaran::d_excel/$1');
	$routes->add('profit/(:any)', 'Profit::index/$1');
	$routes->add('profit-excel/(:any)', 'Profit::d_excel/$1');
	$routes->add('pengeluaran/(:any)', 'Pengeluaran::index/$1');

	$routes->add('store/(:any)', 'Store::index/$1');
	$routes->add('store-excel/(:any)', 'Store::d_excel/$1');

	$routes->add('design/(:any)', 'Design::index/$1');
	$routes->add('design-excel/(:any)', 'Design::d_excel/$1');

	$routes->add('workshop/(:any)', 'Workshop::index/$1');
	$routes->add('workshop-excel/(:any)', 'Workshop::d_excel/$1');

	$routes->add('print-pemasukan/(:any)', 'PrintOut::pemasukan/$1');
	$routes->add('print-pengeluaran/(:any)', 'PrintOut::pengeluaran/$1');
	$routes->add('print-profit/(:any)', 'PrintOut::profit/$1');
});

$routes->group('admin', ['filter' => 'admin'], function ($routes) {
	$routes->add('store/(:any)', 'Store::index/$1');
	$routes->add('edit-store/(:any)', 'Store::edit_store/$1');
	$routes->add('hapus-store/(:any)', 'Store::hapus_store/$1');

	$routes->add('store-excel/(:any)', 'Store::d_excel/$1');
	$routes->add('design-excel/(:any)', 'Design::d_excel/$1');
	$routes->add('workshop-excel/(:any)', 'Workshop::d_excel/$1');
	$routes->add('pemasukan-excel/(:any)', 'Pemasukan::d_excel/$1');
	$routes->add('pengeluaran-excel/(:any)', 'Pengeluaran::d_excel/$1');
	$routes->add('profit-excel/(:any)', 'Profit::d_excel/$1');

	$routes->add('print-pemasukan/(:any)', 'PrintOut::pemasukan/$1');
	$routes->add('print-pengeluaran/(:any)', 'PrintOut::pengeluaran/$1');
	$routes->add('print-profit/(:any)', 'PrintOut::profit/$1');

	$routes->add('design/(:any)', 'Design::index/$1');
	$routes->add('edit-design/(:any)', 'Design::edit_design/$1');
	$routes->add('hapus-design/(:any)', 'Design::hapus_design/$1');

	$routes->add('workshop/(:any)', 'Workshop::index/$1');
	$routes->add('edit-workshop/(:any)', 'Workshop::edit_workshop/$1');
	$routes->add('hapus-workshop/(:any)', 'Workshop::hapus_workshop/$1');

	$routes->add('pemasukan/(:any)', 'Pemasukan::index/$1');

	$routes->add('pengeluaran/(:any)', 'Pengeluaran::index/$1');
	$routes->add('pengeluaran-list/(:any)', 'Pengeluaran::bulan_ini/$1');
	$routes->add('edit-pengeluaran/(:any)', 'Pengeluaran::edit_pengeluaran/$1');
	$routes->add('hapus-pengeluaran/(:any)', 'Pengeluaran::hapus_pengeluaran/$1');

	$routes->add('profit/(:any)', 'Profit::index/$1');



	$routes->add('regis-user', 'User::index');
	$routes->add('update-user/(:any)', 'User::update_user/$1');
	$routes->add('delete-user/(:any)', 'User::delete_user/$1');
});

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
