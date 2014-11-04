<?php namespace App\Model;

class Post extends AbstractEntity implements PostInterface {

	public $id;
	public $title;
	public $content;
	public $author;

	public function __construct($title, $content, AuthorInterface $author)
	{
		$this->setTitle($title);
		$this->setContent($content);
		$this->setAuthor($author);
	}
 
 	public function setTitle($title)
	{
		if(!is_string($title)) 
		{
			throw new \InvalidArgumentException("The title is invalid");
		}

		$this->title = $this->sanitizeString($title);

		return $this;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setContent($content)
	{
		$this->content = $this->sanitizeString($content);

		return $this;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function setAuthor(AuthorInterface $author)
	{
		$this->author = $author;
	}

	public function getAuthor()
	{
		return $this->author;
	}

}