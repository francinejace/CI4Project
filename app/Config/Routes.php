<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', function () {
    return view('site/home');
});
$routes->get('about', 'Pages::about');
$routes->get('products', 'Products::index');
$routes->get('products/form', function () {
    return view('product_form');
});
$routes->post('products/save', 'Products::save');
$routes->get('hello', 'Hello::index');
$routes->get('hello/greet/(:segment)', 'Hello::greet/$1');
$routes->get('blog/(:num)', 'Blog::view/$1');
$routes->get('blogs', function () {
    return view('blog_list');
});

// Auth
$routes->match(['get','post'], 'register', 'Auth::register');
$routes->match(['get','post'], 'login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

// Dealership pages
$routes->get('services', function () { return view('site/services'); });
$routes->get('brands', function () { return view('site/brands'); });
$routes->get('careers', function () { return view('site/careers'); });

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');

// Enable auto routing
$routes->setAutoRoute(true);

