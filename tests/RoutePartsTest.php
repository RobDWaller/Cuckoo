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

    public function testRoutePartsSingle()
    {
        $routeParts = new RouteParts('sample-page', 'va1=one&var2=two');

        $this->assertEquals(1, $routeParts->getUrlParts()->count());
    }

    public function testRoutePartsCountZero()
    {
        $routeParts = new RouteParts('', '');

        $this->assertEquals(0, $routeParts->getUrlParts()->count());
    }

    public function testRoutePartsCountZeroSlash()
    {
        $routeParts = new RouteParts('/', '');

        $this->assertEquals(0, $routeParts->getUrlParts()->count());
    }
}