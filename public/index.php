<?php

require __DIR__.'/../vendor/autoload.php';

// FRONT CONTROLLER SAMPLE

// use ICare\Http\FrontController;
// use ICare\Http\Dispatcher;
// use ICare\Http\Response;
// use ICare\Http\Request;
// use ICare\Http\Router;
// use ICare\Http\Route;

// $route = new Route("/", "TestController@index");

// $route1 = new Route("/test", "TestController@index");
  
// $route2 = new Route("/error", "ErrorController@index");
  
// $router = new Router(array($route, $route1, $route2));
  
// $dispatcher = new Dispatcher;
  
// $frontController = new FrontController($router, $dispatcher);

// $frontController->run();

// DOMAIN MODEL IMPLEMENTING DATA MAPPER - SAMPLE

// use ICare\Database\PDOAdapter;
// use App\Model\Mapper\AuthorMapper;
// use App\Model\Proxy\AuthorProxy;
// use App\Model\Author;
// use App\Model\Post;

// $adapter = new PDOAdapter('mysql:dbname=app-src', 'root');

// $authorMapper = new AuthorMapper($adapter);

// $author = new AuthorProxy(1, $authorMapper);
// // $author = $authorMapper->fetchById(1);

// $post = new POst(
// 	'title',
// 	'content of post',
// 	$author
// 	);

// echo $post->title.'<br>'.$post->author->name.'<hr>'.$post->content;

// COLLECTION OF AGGREGATE ROOTS, IMPLEMENTING DATA MAPPER - SAMPLE

use ICare\Database\PDOAdapter;
use App\Model\Proxy\MenuCollectionProxy;
use App\Model\Collection\MenuCollection;
use App\Model\Mapper\MenuMapper;
use App\Model\MenuCategory;
use App\Model\Menu;

$adapter = new PDOAdapter('mysql:dbname=app-src', 'root');

$menuMapper = new MenuMapper($adapter);

$menus = new MenuCollectionProxy(4, $menuMapper);
// $menus = $menuMapper->fetchAll(['category' => 4]);

$menuCategory = new MenuCategory('lunch deliveries', $menus);

echo '<h1>'.$menuCategory->getName().'</h1><hr>';

foreach($menuCategory->getMenu() as $menu) {
	echo $menu->getName().'<br>';
}

echo '<hr>';
print_r($menuCategory->toArray());