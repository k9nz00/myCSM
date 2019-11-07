<?php

namespace App;


use App\Interfaces\Renderable;
use Exception;

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
    	try {
			if ($this->router->dispatch($this) instanceof Renderable) {
				$this->router->dispatch($this)->render();
			} else {
				echo $this->router->dispatch($this);
			}

		} catch (Exception $e) {

		}

    }
}

