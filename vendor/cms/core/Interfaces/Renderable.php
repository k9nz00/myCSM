<?php


namespace cms\Interfaces;


interface Renderable
{
	public function render(string $view, array $data);
}