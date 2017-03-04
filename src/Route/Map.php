<?php namespace Cuckoo\Route;

use Illuminate\Support\Collection;

class Map
{
	private $base = "Cuckoo\Controller";

	private $parts;

	public function __construct(Collection $parts)
	{
		$this->parts = $parts;
	}

	public function getControllerString()
	{
		return $this->base . "\\" .  ucfirst($this->parts->first());
	}
}