<?php namespace App\Model\Mapper;

use ICare\Database\DatabaseAdapterInterface;
use App\Model\Author;

class AuthorMapper extends AbstractDataMapper implements AuthorMapperInterface {

	protected $entityTable = 'users';

	public function createEntity(array $row)
	{
		return new Author($row['username'], $row['email']);
	}

} 