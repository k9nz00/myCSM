<?php

require_once 'bootstrap.php';
require_once 'web/route.php';

use App\Application;
use App\Router;

$router = new Router();

$application = new Application($router);
$application->run();
