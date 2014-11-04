<?php namespace ICare\View;

/**
 * Decorator implementation for the view 
 */
abstract class ViewDecorator implements ViewInterface {

	const DEFAULT_TEMPLATE = 'default.php';
	protected $template = self::DEFAULT_TEMPLATE;
	protected $view;

	public $viewPath = 'app/views';
	
	/**
	 * @param ViewInterface $view
	 */
	public function __construct(ViewInterface $view)
	{
		$this->view = $view;
	}

	/**
	 * Get the template 
	 *
	 * @return string
	 */
	public function getTemplate()
	{
		return $this->template;
	}

	/**
	 * Get relative path of the template
	 *
	 * @return string
	 */
	public function getViewTemplate()
	{
		return __DIR__.'/../../'.$this->viewPath.'/'.$this->getTemplate();
	}

	/**
	 * Render the view
	 *
	 * @return string
	 */
	public function render()
	{
		return $this->view->render();
	}

	/**
	 * Render the decorator template
	 *
	 * @param array $data 	Data to be passed to the view
	 * @return string 
	 */
	public function renderTemplate(array $data = [])
	{
		extract($data);
		ob_start();
		include $this->getViewTemplate();
		return ob_get_clean();
	}

}