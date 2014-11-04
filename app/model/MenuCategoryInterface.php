<?php namespace App\Model;

use App\Model\Collection\MenuCollectionInterface;

interface MenuCategoryInterface {
	
	public function setId($id);
	public function getId();

	public function setName($name);
	public function getName();

	public function setMenu(MenuCollectionInterface $menu);
	public function getMenu();

}