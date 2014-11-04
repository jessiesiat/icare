<?php namespace App\Model;

class Author extends AbstractEntity implements AuthorInterface {

	protected $id;
	protected $name;
	protected $email;

	public function __construct($name, $email)
	{
		$this->setName($name);
		$this->setEmail($email);
	}
 	
	public function setName($name)
	{
		$this->name = $this->sanitizeString($name);
	}

	public function getName()
	{
		return $this->name;
	}

	public function setEmail($email)
	{
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			throw new \InvalidArgumentException("The email is invalid");
		}

		$this->email = $email;

		return $this;
	}

	public function getEmail()
	{
		return $this->email;
	}

}