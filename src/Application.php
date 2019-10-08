<?php

namespace App;

class Application
{
    private $router;

    /**
     * Application constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function run()
    {
        echo $this->router->dispatch($this);
    }
}
