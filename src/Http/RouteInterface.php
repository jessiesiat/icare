<?php namespace ICare\Http;

interface RouteInterface {
	
	public function match(RequestInterface $request);

}