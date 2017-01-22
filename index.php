<?php


namespace SSPro;

use Dotenv\Dotenv;
use SSPro\Controller\ProcessCoins;
use SSPro\Controller\ProcessShapeShift;

require 'vendor/autoload.php';

$dotenv = new Dotenv(__DIR__);
$dotenv->load();

session_start();



if (isset($_SERVER['REQUEST_URI'])) {
    $uri = str_replace('/', '', $_SERVER['REQUEST_URI']);
}

if ($uri == '') {
    $home = new ProcessCoins();
    $home->get_Shape_Poloniex_Rates();
    die();
}

else {
    header('location: /');
    die();
}


