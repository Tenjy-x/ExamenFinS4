<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login_Operateur','Home::operateur');

$routes->post('/loginClient','AuthController::login');
$routes->get('/index','ClientController::index');