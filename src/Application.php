<?php

namespace App;

use App\Exception\NotFoundException;
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

	/**
	 * @param NotFoundException $e
	 * @return string
	 * @throws Exception
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
            $data = $this->router->dispatch($this);
            if ($data instanceof Renderable) {
                $data->render();
            } else {
                echo $data;
            }
        } catch (NotFoundException $e) {

            return $this->renderException($e);
        }
    }
}
