<?php

namespace App;

use cms\Interfaces\Renderable;

class Application
{
    private $router;

    /**
     * Application constructor.
     *
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    protected function render()
    {
        echo "test";
    }

    public function run()
    {
        if ($this->router->dispatch($this) instanceof Renderable) {
            //$this->router->dispatch($this)->render(); - не понимаю зачем вызывать этот метод???
        } else {
            echo $this->router->dispatch($this);
        }
    }
}

