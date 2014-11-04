<?php namespace ICare\Http;

/** 
 * Handler for all. Accepts the router and dispatcher instance
 * and run the application. 
 */
class FrontController {
 
 	/** 
 	 * @param ICare\Http\Router $router
 	 * @param ICare\Http\Dispatcher $dispatcher
 	 */
	public function __construct($router, $dispatcher) 
	{
		$this->router = $router;
		$this->dispatcher = $dispatcher;

		$this->request = new Request();
		$this->response = new Response();
	}
	
	/**
	 * Run the application
	 *
	 * @return response
	 */
	public function run() 
	{
		$route = $this->router->route($this->request, $this->response);

		return $this->dispatcher->dispatch($route, $this->request, $this->response);
	}

}