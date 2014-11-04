<?php namespace App\Model\Collection;

use App\Model\MenuInterface;

class MenuCollection implements MenuCollectionInterface {

	protected $menus;
	
	public function __construct(array $menus = array())
	{
		foreach($menus as $menu) 
		{
			$this->addMenu($menu);
		}
	}

	public function addMenu(MenuInterface $menu)
	{
		$this->menus[] = $menu;
	}

	public function getMenu()
	{
		return $this->menus;
	}

	public function count()
	{
		return count($this->menus);
	}

	public function getIterator()
	{
		return new \ArrayIterator($this->menus);
	}

}