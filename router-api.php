<?php

require_once 'lib/router.php';
require_once 'app/controllers/equipoApiController.php';
require_once 'app/controllers/zonaApiController.php';

$router = new Router();

$router->addRoute('equipos', 'GET', 'equipoApiController', 'getAll');
$router->addRoute('equipos/:id', 'GET', 'equipoApiController', 'getById');
$router->addRoute('equipos', 'POST', 'equipoApiController', 'create');
$router->addRoute('equipos/:id', 'PUT', 'equipoApiController', 'update');
$router->addRoute('equipos/:id', 'DELETE', 'equipoApiController', 'delete');

$router->addRoute('zonas', 'GET', 'zonaApiController', 'getAll');
$router->addRoute('zonas/:id', 'GET', 'zonaApiController', 'getById');
$router->addRoute('zonas', 'POST', 'zonaApiController', 'create');
$router->addRoute('zonas/:id', 'PUT', 'zonaApiController', 'update');
$router->addRoute('zonas/:id', 'DELETE', 'zonaApiController', 'delete');

$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);