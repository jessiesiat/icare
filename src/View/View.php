<?php namespace ICare\View;

/**
 * Encapsulates view handling
 */
class View implements ViewInterface {

	public $viewPath = 'app/views';
	public $template;
	public $fields = [];

	/**
	 * @param string $template 	Template to use for the view
	 * @param array $fields 	Data fields to be passed to the view	
	 */
	public function __construct($template, $fields = [])
	{
		if($template !== null) {
			$this->setTemplate($template);
		}

		if(!empty($fields)) {
			$this->setFields($fields);
		}
	}

	/** 
	 * Setter for view template
	 *
	 * @param string $template
	 */
	public function setTemplate($template)
	{
		$file = __DIR__.'/../../'.$this->viewPath.'/'.$template.'.php';
		$template = $template.'.php';

		if(!is_file($file) || !is_readable(($file))) {
			throw new \InvalidArgumentException("The template '$template' not found");
		}

		$this->template = $template;
	}

	/**
	 * Getter for view template
	 *
	 * @return string
	 */
	public function getTemplate()
	{
		return $this->template;
	}

	/**
	 * Getter of relative path for the view template.
	 *
	 * @return string
	 */
	public function getViewTemplate()
	{
		return __DIR__.'/../../'.$this->viewPath.'/'.$this->template;
	}

	/**
	 * Set data fields for the view
	 *
	 * @param array $fields 
	 */
	public function setFields($fields = [])
	{
		foreach($fields as $key => $value) {
			$this->fields[$key] = $value;
		}
	}

	public function __set($key, $value)
	{
		$this->fields[$key] = $value;
	}

	public function __get($key)
	{
		if( ! isset($this->fields[$key])) {
			throw new \Exception('Value for '.$key.' not found!');
		}

		return $this->fields[$key];
	}

	/** 
	 * Render the view
	 *
	 * @return string
	 */
	public function render()
	{
		extract($this->fields);
		ob_start();
		include $this->getViewTemplate();
		return ob_get_clean();
	}

}