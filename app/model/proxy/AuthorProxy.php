<?php namespace App\Model\Proxy;

use App\Model\Mapper\AuthorMapperInterface;
use App\Model\AuthorInterface;

class AuthorProxy implements AuthorInterface
{
    protected $author;
    protected $authorId;
    protected $authorMapper;
 
    public function __construct($authorId, AuthorMapperInterface $authorMapper) 
    {
        $this->authorId = $authorId;
        $this->authorMapper = $authorMapper;
    }
     
    public function setId($id) 
    {
        $this->authorId = $id;
        return $this;
    }
     
    public function getId() 
    {
        return $this->authorId;
    }
 
    public function setName($name) 
    {
        $this->loadAuthor();
        $this->author->setName($name);
        return $this;
    }
     
    public function getName() 
    {
        $this->loadAuthor();

        return $this->author->name;
    }
     
    public function setEmail($email) 
    {
        $this->loadAuthor();
        $this->author->setEmail($email);
        return $this;
    }
     
    public function getEmail() 
    {
        $this->loadAuthor();
        return $this->author->getEmail();
    }
     
    protected function loadAuthor() 
    {
        if ($this->author === null) {
             
            if(!$this->author = $this->authorMapper->fetchById($this->authorId)) {
                throw new UnexpectedValueException(
                    "Unable to fetch the author.");
            }
        }
         
        return $this->author;
    }

    public function __get($field)
    {
        $this->loadAuthor();
        
        return $this->author->$field;
    }

}