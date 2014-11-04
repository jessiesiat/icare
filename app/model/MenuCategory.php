<?php namespace App\Model;

use App\Model\Collection\MenuCollectionInterface;

class MenuCategory implements MenuCategoryInterface {

	protected $id;

	protected $name;

	protected $menuCollection;
	
	public function __construct($name, MenuCollectionInterface $menuCollection)
	{
		$this->setName($name);
		$this->menuCollection = $menuCollection;
	}

	public function setId($id)
	{	
		if($this->id !== null)
		{
			throw new \BadMethodCallException("The ID is already set");
		}
		if(!is_int($id) || $id < 1)
		{
			throw new \InvalidArgumentException("The ID is invalid");
		}

		$this->id = $id;	

		return $this;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setName($name)
	{
		if(!is_string($name)) 
		{
			throw new \InvalidArgumentException("The name is required");
		}

		$this->name = $name;

		return $this;
	}

	public function getName()
	{
		return $this->name;
	} 

	public function setMenu(MenuCollectionInterface $menu)
	{
		$this->menu = $menu;
	}

	public function getMenu()
	{
		return $this->menuCollection->getMenu();
	}

}