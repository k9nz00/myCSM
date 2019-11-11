<?php

namespace App\Exception;


use App\Base\BaseView\View;
use App\Interfaces\Renderable;

class NotFoundException extends HttpException implements Renderable
{
    public function render()
    {
//        $message = $this->getMessage() . '. Запрошенному url не соответствует ни один установленный маршрут (Route)';
//        $message .= ' Код ошибки ' . $this->getCode();
//        return $message;
		//добавить новые данные и передавать в красивый шаблон.

		return (new View('errors.404', ['test']))->$this->render();
    }
}
