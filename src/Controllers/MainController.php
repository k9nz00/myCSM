<?php

namespace App\Controllers;

use App\Base\BaseController\Controller;
use App\Base\BaseView\View;
use App\Config;
use App\Model\Book;

class MainController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $title = 'Hello world!';

        return new View('index', compact('books', 'title'));
    }

    public function about()
    {
        return new View('about.index', ['title' => 'About Page']);
    }
}
