<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about', 'Pages::about'); // Example static page
$routes->get('products', 'Products::index'); // Products list
$routes->get('products/(:num)', 'Products::details/$1'); // Product details with ID
$routes->post('products/save', 'Products::save'); // Example POST route
$routes->get('products/form', 'Products::form'); // Form for testing POST
$routes->get('products/save', 'Products::form'); // Allow GET to show form (prevents 404 on direct GET)
$routes->get('test', 'Test::index');

