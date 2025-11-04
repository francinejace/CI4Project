<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('products', 'Products::index');
$routes->get('products/(:num)', 'Products::details/$1');

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');

//Enable auto-routing
$routes->setAutoRoute('improved');
