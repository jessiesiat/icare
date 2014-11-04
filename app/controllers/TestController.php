<?php

use ICare\View\OuterViewDecorator;
use ICare\View\View;

class TestController extends BaseController {
	
	public function  __construct()
	{
	}

	public function index()
	{
		$partialView = new View('partial', ['name' => 'Jessie Siat']);
		$view = new OuterViewDecorator($partialView);

		return $view->render();
	}

}

