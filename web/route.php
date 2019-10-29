<?php

use App\Controllers\MainController;
use App\Router;


use cms\base\View;

Router::get('/', MainController::class . "@index");
Router::get('/about',MainController::class . '@about');

Router::get('/company', function () {
    return new View('index', ['title'=>'company page']);
});