<?php 

use ICare\Http\ResponseInterface;
use ICare\Http\RequestInterface;

class BaseController {

	public $request;
	
	public function execute()  
	{
		$response->send();

		$this->request = $request;
	}

}