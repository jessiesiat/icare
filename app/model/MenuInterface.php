<?php namespace App\Model;

interface MenuInterface {
	
	public function setId($id);
	public function getId();

	public function setName($name);
	public function getName();

}