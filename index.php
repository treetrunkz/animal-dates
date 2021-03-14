<?php
//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require necessary files
require_once('vendor/autoload.php');
require_once('model/data-layer.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

$controller = new Controller($f3);

$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render('views/home.html');
});
