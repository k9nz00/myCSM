<?php

namespace App\Exception;


use App\Interfaces\Renderable;

class NotFoundException extends HttpException implements Renderable
{
    public function render()
    {
        $message = $this->getMessage() . '. Запрошенному url не соответствует ни один установленный маршрут (Route)';
        $message .= ' Код ошибки ' . $this->getCode();
        return $message;
    }
}
