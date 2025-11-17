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
$routes->get('hello', 'Hello::index');
$routes->get('hello/greet/(:segment)', 'Hello::greet/$1');
$routes->get('blog/(num)', 'Blog::views/$1');

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');

// Enable auto routing
$routes->setAutoRoute(true);

