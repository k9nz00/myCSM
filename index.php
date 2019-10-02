<?php

use src\Application;
use src\Controller;
use src\Router;

require_once 'bootstrap.php';

$router = new Router();
$router->get('/', Controller::class . '@index');
$router->get('/about', Controller::class . '@about');
$router->get('/company', function () {
    return 'company';
});

$application = new Application($router);
$application->run();
