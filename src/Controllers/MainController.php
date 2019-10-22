<?php

namespace App\Controllers;

use cms\base\View;

class MainController
{
    public function index()
    {
		return new View('index', ['title'=>'Index Page']);
    }

    public function about()
    {
		return new View('about.index', ['title'=>'About Page']);
    }

}