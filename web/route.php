<?php

use App\Base\BaseView\View;
use App\Controllers\MainController;
use App\Router;

Router::get('/', MainController::class . "@index");
Router::get('/about', MainController::class . '@about');

Router::get('/company', function ()
{
    return new View('index', ['title' => 'company page']);
});
