<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Home::index');
$routes->get('about', 'Pages::about');
$routes->get('products', 'Products::index');
$routes->get('products/form', function () {
    return view('product_form');
}); 
$routes->post('products/save', 'Products::save');

