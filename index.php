<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/route/route.php';

use App\Application;
use App\Router;

$router = new Router();

$application = new Application($router);
$application->run();
