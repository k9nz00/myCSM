<?php

namespace App\Exception;


use App\Interfaces\Renderable;

class NotFoundException extends HttpException implements Renderable
{
	public function render()
	{

	}


}