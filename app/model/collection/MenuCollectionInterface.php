<?php namespace App\Model\Collection;

use App\Model\MenuInterface;

interface MenuCollectionInterface extends \Countable, \IteratorAggregate {
	
	public function getMenu();

}