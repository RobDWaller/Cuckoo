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

		$this->assertInstanceOf('Cuckoo\Route\RouteParts', $parts);		

		$this->assertInstanceOf('Illuminate\Support\Collection', $parts->getUrlParts());

		$this->assertEquals(null, $parts->getQueryParts());

		$this->assertEquals('category', $parts->getUrlParts()->first());
	}

	public function testRoutePartsWithQueryParameters()
	{
		$route = new Route('/category/uncategorised?param1=two&param2=three&param3=four');	
		
		$parts = $route->parts();

		$this->assertInstanceOf('Cuckoo\Route\RouteParts', $parts);		

		$this->assertInstanceOf('Illuminate\Support\Collection', $parts->getUrlParts());

		$this->assertInstanceOf('Illuminate\Support\Collection', $parts->getQueryParts());
	}

}