<?php

namespace cms\base;

use cms\Interfaces\Renderable;

class View implements Renderable
{
	const LAYOUT = LAYOUTS_DIR . 'default/default.php';
	/**
	 * Подключаемый шаблон
	 *
	 * @var string $view
	 */
	public $view;

	/**
	 * Массив с данными для подключаемого шаблона
	 *
	 * @var array $data
	 */
	public $data;

	/**
	 * Дефолтный шаблон
	 * 	@todo переделать и дать возможность подключать желаемый шаблон
	 *
	 * @var string $layout
	 */
	public $layout;

	public function __construct($view, $data = [])
	{
		$this->view = $view;
		$this->data = $data;
		$this->layout = self::LAYOUT;
		$this->render($this->view, $this->data);
	}

	public function render($view, $data)
	{
		if (is_array($data))
		{
			extract($data);
		}
		$viewFile = VIEW_DIR . str_replace('.', '/', $view) . '.php';
		if (file_exists($viewFile))
		{
			ob_start();
			require_once $viewFile;
			$content = ob_get_clean();
		}
		else
		{
			throw new \Exception("На найден вид {$viewFile}", 500);
		}

		if (is_file(self::LAYOUT))
		{
			require_once $this->layout;
		}
		else
		{
			throw new \Exception("На найден шаблон {$this->layout}", 500);
		}
	}
}