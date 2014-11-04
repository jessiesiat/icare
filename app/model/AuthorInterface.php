<?php namespace App\Model;

interface AuthorInterface {
 
	public function setId($id);
	public function getId();
	
	public function setName($name);
	public function getName();

	public function setEmail($email);
	public function getEmail();

}