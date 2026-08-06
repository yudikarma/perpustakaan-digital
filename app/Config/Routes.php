<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('book/detail/(:num)', 'Home::detail/$1');

// Admin Auth
$routes->get('login', 'Auth::login');
$routes->post('login-process', 'Auth::loginProcess');
$routes->get('logout', 'Auth::logout');

// Admin Protected Routes
$routes->group('admin', function($routes) {
    $routes->get('dashboard', 'Admin\Book::dashboard');
    $routes->get('book', 'Admin\Book::index');
    $routes->get('book/create', 'Admin\Book::create');
    $routes->post('book/store', 'Admin\Book::store');
    $routes->get('book/edit/(:num)', 'Admin\Book::edit/$1');
    $routes->post('book/update/(:num)', 'Admin\Book::update/$1');
    $routes->get('book/delete/(:num)', 'Admin\Book::delete/$1');
});
