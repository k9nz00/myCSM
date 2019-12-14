<?php

use App\Base\BaseView\View;
use App\Controllers\MainController;
use App\Router;

Router::get('/', MainController::class . "@index");
Router::get('/about', MainController::class . '@about');

Router::get('/company', function () {
    return new View('company.index', ['title' => 'company page']);
});


Router::get('test1/*/test2/*', function ($param1, $param2){
//    return '1 = ' . $param1 . ' and 2 = ' . $param2;
    return '1 = ' . $param1 . ' and 2 = ' . $param2;
});