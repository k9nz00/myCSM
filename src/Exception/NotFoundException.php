<?php

namespace App\Exception;


use App\Base\BaseView\View;
use App\Interfaces\Renderable;

class NotFoundException extends HttpException implements Renderable
{
    public function render()
    {
        $errorView = new View('errors.404', ['test']);
        return $errorView->render();
    }
}
