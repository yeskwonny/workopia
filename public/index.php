<?php
require '../helpers.php';
//loadView('home');
//require basePath('views/home.view.php');


$uri = $_SERVER['REQUEST_URI'];
require basePath('router.php');
