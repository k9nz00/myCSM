<?php

require_once 'bootstrap.php';

use App\Application;
use App\MainController;
use App\Router;

$router = new Router();
$router->get('/', MainController::class . '@index');
$router->get('/about', MainController::class . '@about');
$router->get('/company', function () {
    return 'company';
});

$application = new Application($router);
$application->run();
