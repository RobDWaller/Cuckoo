<?php
 
use Cuckoo\Route\Route;

class RouteTest extends PHPUnit_Framework_TestCase 
{
	public function testRouteCleanUrl()
	{
		$route = new Route('/category/uncategorised/');

		$clean = $route->getCleanUrl();

		$this->assertEquals('category/uncategorised', $clean);
	}

	public function testRouteCleanUrladFormatStart()
	{
		$route = new Route('category/uncategorised/');

		$clean = $route->getCleanUrl();

		$this->assertEquals('category/uncategorised', $clean);
	}

	public function testRouteCleanUrlBadFormatEnd()
	{
		$route = new Route('/category/uncategorised');

		$clean = $route->getCleanUrl();

		$this->assertEquals('category/uncategorised', $clean);
	}

	public function testRouteGetQueryParameters()
	{
		$route = new Route('/category/uncategorised?param1=two&param2=three&param3=four');

		$query = $route->getQueryParameters();

		$this->assertEquals('param1=two&param2=three&param3=four', $query);	
	}

	public function testRouteParts()
	{
		$route = new Route('/category/uncategorised/');	
		
		$parts = $route->parts();

		$this->assertInstanceOf('Cuckoo\Route\Route', $parts);

		$this->assertInstanceOf('Cuckoo\Route\RouteParts', $parts->getRouteParts());		

		$this->assertInstanceOf('Illuminate\Support\Collection', $parts->getRouteParts()->getUrlParts());

		$this->assertEquals(null, $parts->getRouteParts()->getQueryParts());

		$this->assertEquals('category', $parts->getRouteParts()->getUrlParts()->first());
	}

	public function testRoutePartsWithQueryParameters()
	{
		$route = new Route('/category/uncategorised?param1=two&param2=three&param3=four');	
		
		$parts = $route->parts();

		$this->assertInstanceOf('Cuckoo\Route\Route', $parts);

		$this->assertInstanceOf('Cuckoo\Route\RouteParts', $parts->getRouteParts());		

		$this->assertInstanceOf('Illuminate\Support\Collection', $parts->getRouteParts()->getUrlParts());

		$this->assertInstanceOf('Illuminate\Support\Collection', $parts->getRouteParts()->getQueryParts());
	}

	public function testRouteMap()
	{
		$route = new Route('/category/uncategorised?param1=two&param2=three&param3=four');	
		
		$map = $route->parts()->map();

		$this->assertInstanceOf('Cuckoo\Route\Route', $map);

		$this->assertEquals('Cuckoo\Controller\Category', $map->getControllerString());

		$this->assertTrue($map->hasController());

		$this->assertInstanceOf('Illuminate\Support\Collection', $map->getParameters());
	}

}