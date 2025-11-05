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

// Auth routes
$routes->match(['get','post'], 'register', 'Auth::register');
$routes->match(['get','post'], 'login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

// Dashboards
$routes->get('customer', 'Customer::index');
$routes->get('customer/profile', 'Customer::profile');
$routes->get('admin', 'Admin::index');
$routes->match(['get','post'], 'admin/edit/(:num)', 'Admin::edit/$1');
$routes->get('admin/delete/(:num)', 'Admin::delete/$1');

