<?php namespace App\Model\Proxy;

use App\Model\Collection\MenuCollectionInterface;
use App\Model\Mapper\MenuMapperInterface;

class MenuCollectionProxy implements MenuCollectionInterface {

	protected $menuCategoryId;

	protected $menuMapper;

	protected $menus;
	
	public function __construct($menuCategoryId, MenuMapperInterface $menuMapper)
	{
		$this->menuCategoryId = $menuCategoryId;
		$this->menuMapper = $menuMapper;
	}

	public function getMenu()
	{
		if($this->menus === null)
		{
			if(!$this->menus = $this->menuMapper->fetchAll(["category" => $this->menuCategoryId]))
			{
				throw new \UnexpectedValueException("Cannot fetch menu");
			}
		}

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