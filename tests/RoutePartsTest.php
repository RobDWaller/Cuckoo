<?php
 
use Cuckoo\Route\RouteParts;

class RoutePartsTest extends PHPUnit_Framework_TestCase 
{
	public function testRouteParts()
	{
		$routeParts = new RouteParts('category/uncategorised', 'va1=one&var2=two');

		$this->assertInstanceOf('Illuminate\Support\Collection', $routeParts->getUrlParts());

		$this->assertInstanceOf('Illuminate\Support\Collection', $routeParts->getQueryParts());
	}
}