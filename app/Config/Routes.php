<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Default route (beranda / dashboard)
$routes->get('/', 'Dashboard::index');

// Route untuk halaman chart cashflow
$routes->group('chart', function($routes) {
    $routes->get('cashflow', 'Chart::cashflow');
    // Tambah lainnya di sini...
});


