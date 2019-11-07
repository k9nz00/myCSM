<?php

namespace App;

use App\Exception\NotFoundException;
use App\Interfaces\Renderable;

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

    /**
     * @param NotFoundException $e
     * @return string
     */
    public function renderException(NotFoundException $e)
    {
        if ($e instanceof Renderable) {
            return $e->render();
        } else {
            $e->errorCode = $e->getCode() ? $e->getCode() : 500;
            echo $e->getMessage();
        }
    }

    public function run()
    {
        try {
            if ($this->router->dispatch($this) instanceof Renderable) {
                $this->router->dispatch($this)->render();
            } else {
                echo $this->router->dispatch($this);
            }
        } catch (NotFoundException $e) {
            echo $this->renderException($e);
        }
    }
}
