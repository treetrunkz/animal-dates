<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('vendor/autoload.php');

require $_SERVER['DOCUMENT_ROOT']."/../config.php";

//Instantiate Fat-Free
$f3 = Base::instance();
$database = new Database($dbh);
$validator = new Validate();
$dataLayer = new DataLayer();
$controller = new Controller($f3);
//Turn on Fat-Free error reporting

session_start();

$f3->set('DEBUG', 3);

$f3->route('GET /', function() {
    global $controller;
    $controller->home();
});


$f3->route('GET|POST /order', function () use ($f3) {
    global $controller;
    $controller->info1();
});

$f3->route('GET|POST /order2', function ($f3) {
    global $controller;
    $controller->info2();
});

$f3->route('GET|POST /order3', function () {
    global $controller;
    $controller->info3();
});
$f3->route('GET /summary', function () {
    global $controller;
    $controller->summary();
});
$f3->run();