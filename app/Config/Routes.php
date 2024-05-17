<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'auth', 'as' => 'home']);
$routes->get('home', 'Home::index', ['filter' => 'auth', 'as' => 'home.link']);

$routes->get('login', 'Login::index', ['as' => 'login']);
$routes->post('login/cek', 'Login::cek', ['as' => 'login.cek']);
$routes->get('logout', 'Login::logout', ['as' => 'logout']);

$routes->add('password', 'Pengguna::password', ['filter' => 'auth', 'as' => 'password']);

$routes->group('pengguna', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Pengguna::index', ['as' => 'pengguna']);
    $routes->add('tambah', 'Pengguna::tambah', ['as' => 'pengguna.tambah']);
    $routes->add('ubah/(:num)', 'Pengguna::ubah/$1', ['as' => 'pengguna.ubah']);
    $routes->post('hapus/(:num)', 'Pengguna::hapus/$1', ['as' => 'pengguna.hapus']);
});
