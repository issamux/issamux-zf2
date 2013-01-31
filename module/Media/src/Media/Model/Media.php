<?php
 
namespace Media\Model;

class Media
{
	public $id;
	public $author;
	public $title;
	public $description;
	public $data;

	public function exchangeArray($data)
	{
		$this->id     = (isset($data['id'])) ? $data['id'] : null;
		$this->author = (isset($data['author'])) ? $data['author'] : null;
		$this->title  = (isset($data['title'])) ? $data['title'] : null;
		$this->description = (isset($data['description'])) ? $data['description'] : null;
		$this->data  = (isset($data['data'])) ? $data['data'] : null;
	}
}