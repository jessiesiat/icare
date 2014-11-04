<?php namespace ICare\View;

/**
 * Much like a layout view decorator that renders the content 
 * within it. 
 */
class OuterViewDecorator extends ViewDecorator {

	/**
	 * @var string $template 	Layout to be used
	 */
	protected $template = 'layout.php';
	
	/**
	 * Render the layout in order
	 * 
	 * @return string
	 */
	public function render()
	{
		// Assign 'content' data field to the view
		$data['content'] = $this->view->render();

		echo $this->renderTemplate($data);
	}

}