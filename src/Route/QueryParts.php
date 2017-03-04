<?php namespace Cuckoo\Route;

class QueryParts
{
	private $key;

	private $value;

	public function __construct($queryPartString)
	{
		$split = explode('=', $queryPartString);

		$this->key = $split[0];

		$this->value = $split[1];
	}

	public function getKey()
	{
		return $this->key;
	}

	public function getValue()
	{
		return $this->value;
	}
}