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

$routes->get('/board', 'Board::list');
$routes->get('/boardWrite', 'Board::write');

// (:num) , /$1 -> url에서 어디에 입력한 값인지 지정해주고 컨트롤러에 그 값을 넘겨줌
$routes->get('/boardView/(:num)', 'Board::view/$1');

$routes->match(['get','post'],'writeSave','Board::save');
$routes->match(['get','post'],'/loginok','MemberController::loginok');


// member
$routes->get('/login', 'MemberController::login');
$routes->get('/logout', 'MemberController::logout');
$routes->match(['get', 'post'], '/loginok', 'MemberController::loginok');
