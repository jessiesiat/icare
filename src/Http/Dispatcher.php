<?php namespace ICare\Http;

/** 
 * Dispatches the current route
 */
class Dispatcher {
 
 	/**
 	 * @param $route instance of the RouteInterface
 	 * @param $request instance of the RequestInterface
 	 * @param $response instance of the ResponseInterface
 	 * 
 	 * @return callback
 	 */
  	public function dispatch($route, $request, $response)
  	{
    	$response->send();
    	
    	$res = $route->createController($request);

    	return $res;
  	}

}