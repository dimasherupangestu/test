<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Place your route definitions here
$routes->get('/', 'Home::index');
// admin hidengame
$routes->match(['get', 'post'], 'SuperPag3', 'Admin\Home::index');
$routes->match(['get', 'post'], '/admin/logout', 'Admin\Home::logout');
$routes->match(['get', 'post'], '/admin/login', 'Admin\Home::login');
// $routes->match(['get', 'post'], '/h1dD3nG4m33e', 'Admin\Home::login');

// admin games
$routes->match(['get', 'post'], '/admin/games', 'Admin\Games::index');
$routes->match(['get', 'post'], '/admin/games/create', 'Admin\Games::create');
$routes->match(['get', 'post'], '/admin/games/delete/(:num)', 'Admin\Games::delete/$1');
$routes->match(['get', 'post'], '/admin/games/edit/(:num)', 'Admin\Games::edit/$1');

// admin kategori
$routes->match(['get', 'post'], '/admin/kategori', 'Admin\Kategori::index');
$routes->match(['get', 'post'], '/admin/kategori/add', 'Admin\Kategori::add');
$routes->match(['get', 'post'], '/admin/kategori/edit/(:num)', 'Admin\Kategori::edit/$1');
$routes->match(['get', 'post'], '/admin/kategori/delete/(:num)', 'Admin\Kategori::delete/$1');
$routes->match(['get', 'post'], '/admin/password', 'Admin\Home::password');
$routes->match(['get', 'post'], 'games/(:any)', 'Games::index/$1');

// admin produk
$routes->match(['get', 'post'], '/admin/produk', 'Admin\Produk::index');
$routes->match(['get', 'post'], '/admin/produk/add', 'Admin\Produk::add');

/*

 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * want to override any defaults in this file. You can require additional
 * route files here to ensure that it gets loaded after the above routes.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
