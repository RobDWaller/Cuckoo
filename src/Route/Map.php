<?php namespace Cuckoo\Route;

use Cuckoo\Route\RouteParts;

class Map
{
	private $base = "Cuckoo\Controller";

	private $parts;

	public function __construct(RouteParts $parts)
	{
		$this->parts = $parts;
	}

	public function getControllerString()
	{
		return $this->base . "\\" .  ucfirst($this->parts->getUrlParts()->first());
	}

	public function hasController($controllerString)
	{
		return class_exists($controllerString);
	}

	public function getParameters()
	{
		return $this->parts->getQueryParts();
	}
}