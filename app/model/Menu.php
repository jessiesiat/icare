<?php namespace App\Model;

class Menu implements MenuInterface {

	protected $id;

	protected $name;

	public function __construct($name)
	{
		$this->setName($name);
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
			throw new \InvalidArgumentException("The name must be a string");
		}

		$this->name = $name;

		return $this;
	}

	public function getName()
	{
		return $this->name;
	}

}