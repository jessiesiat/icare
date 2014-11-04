<?php namespace ICare\Http;

/**
 * The worker of routes 
 */
class Router {

  /**
   * @param $routes   array of Route
   */
  public function __construct($routes) 
  {
    $this->addRoutes($routes);
  }
  
  /**
   * Add route to the router 
   *
   * @param $route  route instance
   * @return this
   */
  public function addRoute(RouteInterface $route) 
  {
    $this->routes[] = $route;
    return $this;
  }
  
  /**
   * Add routes to the router 
   *
   * @param $routes   route instances
   * @return this
   */
  public function addRoutes(array $routes) 
  {
    foreach ($routes as $route) {
      $this->addRoute($route);
    }
    return $this;
  }
  
  /**
   * Get all registered routes
   *
   * @return array
   */
  public function getRoutes() 
  {
    return $this->routes;
  }
  
  /**
   * Matches the route for the current request
   *
   * @return RouteInterface
   * @throws \OutOfRangeException
   */
  public function route(RequestInterface $request, ResponseInterface $response) 
  {
    foreach ($this->routes as $route) {
      if ($route->match($request)) {
        return $route;
      }
    }
    $response->addHeader("404 Page Not Found")->send();
    throw new \OutOfRangeException("No route matched the given URI.");
  }

}