<?php

use src\Application;
use src\Router;

require_once 'bootstrap.php';

$router = new Router();
$router->get('/',     function() {
    return  'home';
});
$router->get('about', function() {
    return 'about';
});

$application = new Application($router);
$application->run();