<?php

/**
 * This class will be called by the Crontask to update the DB
 */
namespace SSPro;
use Dotenv\Dotenv;
use SSPro\Controller\ProcessCoins;
use SSPro\Controller\ProcessShapeShift;

require 'vendor/autoload.php';

$dotenv = new Dotenv(__DIR__);
$dotenv->load();


/**
 * Updates the ShapeShift_Rates Table
 */
$shape = new ProcessCoins();
$shape->processCoinData();

echo "Completed";
die();



