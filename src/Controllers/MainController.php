<?php

namespace App\Controllers;

use App\Base\BaseController\Controller;
use App\Base\BaseView\View;

class MainController extends Controller
{
    public function index()
    {
        return new View('index', ['title' => 'Index Page']);
    }

    public function about()
    {
        return new View('about.index', ['title' => 'About Page']);
    }
}
