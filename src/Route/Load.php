<?php namespace Cuckoo\Route;

use Illuminate\Support\Collection;

class Load
{
	public function loadController($classString, Collection $parameters)
	{
		$controller = new $classString;

		$controller->load($parameters);
	}
}