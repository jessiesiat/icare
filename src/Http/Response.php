<?php namespace ICare\Http;

/**
 * Response object
 */
class Response implements ResponseInterface {

	const VERSION = 1.0;

	protected $headers = [];
	
	public function __construct() 
	{
	  $this->version = self::VERSION;
	}
  
	public function getVersion() 
	{
	  return $this->version;
	}
  
  	/**
  	 * Setter for header
  	 */	
	public function addHeader($header) 
	{
	  $this->headers[] = $header;
	  return $this;
	}
  
  	/**
  	 * Setter for an array of headers
  	 */
	public function addHeaders(array $headers) 
	{
	  foreach ($headers as $header) {
		$this->addHeader($header);
	  }
	  return $this;
	}
  
  	/**
  	 * Getter for all headers
  	 *
  	 * @return array
  	 */
	public function getHeaders() 
	{
	  return $this->headers;
	}
  
  	/**
  	 * Send the headers 
  	 */
	public function send() 
	{
	  if (!headers_sent()) {
		foreach($this->headers as $header) {
		  header("$this->version $header", true);
		}
	  } 
	}

}