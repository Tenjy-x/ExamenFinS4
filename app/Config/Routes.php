<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login_Operateur','Home::operateur');

$routes->post('/loginClient','AuthController::login');
$routes->get('/index','ClientController::index');

$routes->get('/depot','ClientController::depot');
$routes->get('/retrait','ClientController::retrait');
$routes->get('/transfert','ClientController::transfert');

//admin
$routes->get('/indexAdmin','AdminController::index');

//depot
$routes->get('traitement_depot','TransactionController::traiter_depot');
$routes->get('traitement_retrait','TransactionController::traiter_retrait');
$routes->get('traitement_transfert','TransactionController::traiter_transfert');