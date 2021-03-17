<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//autoload classes, model, and controllers
require_once('vendor/autoload.php');

//PDO Call
require $_SERVER['DOCUMENT_ROOT']."/../config.php";

//Instantiate Fat-Free
$f3 = Base::instance();

//database object with the PDO db variable attached
$database = new Database($dbh);

//validator object used in the controller
$validator = new Validate();

//datalayer to shrink f3 hive calls
$dataLayer = new DataLayer();

//PHP controller
$controller = new Controller($f3);
//Turn on Fat-Free error reporting

//State session begin storing data
session_start();

//turn on debugging
$f3->set('DEBUG', 3);

//Created Routes with a protected data layer and controller
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
$f3->route('GET|POST /summary', function () {
    global $controller;
    $controller->summary();
});
$f3->route('GET|POST /ec', function() {
    global $controller;
    $controller->extracredit();
});

//Run f3 engine
$f3->run();