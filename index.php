<?php

require_once 'bootstrap.php';

//routs
$router = new \App\Router();
$router->get('/',     function() {
    return 'home';
});
$router->get('about', function() {
    return 'about';
});


$application = new \App\Application($router);
$application->run();
