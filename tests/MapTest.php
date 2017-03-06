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

	public function testControllerDoesNotExistPage()
	{
		$routeParts = new RouteParts('sample-page', null);

		$map = new Map($routeParts);

		$controllerString = $map->getControllerString();

		$this->assertFalse($map->hasController($controllerString));

		$this->assertTrue($map->isPossiblePage());

		$this->assertEquals('Cuckoo\Controller\Page', $map->getPageControllerString());
	}

	public function testControllerDoesNotExistPost()
	{
		$routeParts = new RouteParts('2017/03/04/hello-world', null);

		$map = new Map($routeParts);

		$controllerString = $map->getControllerString();

		$this->assertFalse($map->hasController($controllerString));

		$this->assertTrue($map->isPossiblePost());

		$this->assertEquals('Cuckoo\Controller\Post', $map->getPostControllerString());
	}
}