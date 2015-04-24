<?php namespace App;

Use Rhumsaa\Uuid\Uuid;

Class GenerateId {

	private $id;

	public function __construct()
	{
		$this->id = Uuid::uuid4();
	}

	public function toString()
	{
		return $this->id->toString();
	}

	public function __toString()
	{
		return $this->toString();
	}	
}