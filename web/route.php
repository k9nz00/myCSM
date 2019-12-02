<?php

use App\Base\BaseView\View;
use App\Controllers\MainController;
use App\Router;

Router::get('/', MainController::class . "@index");
Router::get('/about', MainController::class . '@about');

Router::get('/company', function () {
    return new View('company.index', ['title' => 'company page']);
});

//Router::get('/test/*/test2/*', function ($param1, $param2) {
//    return "Test page with param1=$param1 param2=$param2";
//});

Router::get('test/1', function (){
    echo 'test';
});