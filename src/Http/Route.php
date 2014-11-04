<?php namespace ICare\Http;

/** 
 * This class is responsible for defining routes in your app.
 * e.g.
 *
 * $route = new Route('/', 'HelloController@index');
 */
class Route implements RouteInterface {
 
 	/**
 	 * @param $path Uri path 
 	 * @param $action Controller action responsible for dispatching the route
 	 */
	public function __construct($path, $action) 
	{
		$this->path = $path;
		$this->action = $action;
	}
	
	/**
	 * Matches the current request to this route path
	 *
	 * @param $request implementation of the RequestInterface
	 */
	public function match(RequestInterface $request) 
	{
		return $this->path === $request->getUri();
	}
	
	/** 
	 * Call the controller action and pass in the request params
	 *
	 * @return callback
	 */
	public function createController($request) 
	{
		$class = explode('@', $this->action);

		return call_user_func([new $class[0](), $class[1]], $request->getParams());
	}

}
