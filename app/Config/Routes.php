<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home/test', 'Home::Test');

//$routes->get('/board', 'board::index');
//$routes->get('/board/write', 'board::write');
//$routes->get('/board/(:any)', 'board::reRoute');


