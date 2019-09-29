<?php


namespace App;


class Application
{
    public $currentRoute;

    /**
     * @var Router
     */
    public $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
        $this->currentRoute = trim($_SERVER['REQUEST_URI'], '/');
    }

    public function run()
    {
        $this->router->get();

    }
}