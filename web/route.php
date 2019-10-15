<?php

use App\Controllers\MainController;
use App\Router;

Router::get('/', MainController::class . "@index");
Router::get('/about',MainController::class . '@about');
Router::get('/company', function () {
    return 'company';
});