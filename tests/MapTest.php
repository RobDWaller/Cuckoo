<?php
 
use Cuckoo\Route\RouteParts;
use Cuckoo\Route\Map;

class RouteMapTest extends PHPUnit_Framework_TestCase 
{
	public function testControllerExists()
	{
		$routeParts = new RouteParts('category/uncategorised', 'va1=one&var2=two');

		$map = new Map($routeParts);

		$this->assertTrue($map->hasController('Cuckoo\Controller\Category'));
	}
}