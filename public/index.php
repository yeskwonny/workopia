<?php
require '../helpers.php';
require basePath('Database.php');
$config = require basePath('config/db.php');

$db = new Database($config);
//loadView('home');
//require basePath('views/home.view.php');

// super global
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// inspect($uri);
// inspect($method);

require basePath('Router.php');

// using class
$router = new Router();
$routes = require basePath('routes.php');

$router->route($uri, $method);
