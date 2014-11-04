<?php namespace ICare\Http;

/**
 * Get necessary information about a particular request
 */
class Request implements RequestInterface {

	/**
	 * @var params for the current request
	 */
	public $params = [];

	/**
	 * @var URI for the current request
	 */
	public $uri;

	/**
	 * @var URI base path
	 */
	public $base_path = '/hack-ground/icare';
	
	/**
	 * Parse the uri once initialize.
	 */
	public function __construct() 
	{ 
		$this->parseUri();
	}
	
	/**
	 * Getter for uri
	 *
	 * @return string
	 */
	public function getUri() 
	{
	  	return $this->uri;
	}

	/**
	 * Parses the uri 
	 * 
	 * @return void
	 */
	public function parseUri()
	{
		// trim for backward slashes
		$path = rtrim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), '/');

		// removes the base path part in the start of path if given.
		// substr returns a boolean false when on root path, we'll
		// change the uri to '/' then.
		if(strpos($path, $this->base_path) !== false) {
			$this->uri = substr($path, strlen($this->base_path)) ?: '/';
		} else {
			$this->uri = $path ?: '/';
		}
	}
	
	/**
	 * Set request param
	 * 
	 * @return void
	 */
	public function setParam($key, $value) 
	{
	  	$this->params[$key] = $value;
	  	return $this;
	}
	
	/**
	 * Get param by its key
	 * 
	 * @return string
	 * @throws \InvalidArgumentException
	 */
	public function getParam($key) 
	{
	  	if (!isset($this->params[$key])) {
	  	  	throw new \InvalidArgumentException("The request parameter with key '$key' isnvalid."); 
	  	}
	  	return $this->params[$key];
	}
	
	/**
	 * Get all params
	 *
	 * @return array
	 */
	public function getParams() 
	{
	  	return $this->params;
	}

}