<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Home::index');
$routes->get('about', 'Pages::about');
$routes->get('products', 'Products::index');
$routes->get('products/(:num)', 'Products::details/$1');
$routes->get('products/save', 'Products::save');

