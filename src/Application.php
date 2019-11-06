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

    public function run()
    {
        if ($this->router->dispatch($this) instanceof Renderable) {
            $this->router->dispatch($this)->render();
        } else {
            echo $this->router->dispatch($this);
        }
    }
}

