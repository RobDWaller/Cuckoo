<?php
 
use Cuckoo\Route\Clean;

class RouteCleanTest extends PHPUnit_Framework_TestCase 
{
	public function testCleanStart()
	{
		$clean = new Clean();

		$this->assertEquals('category/uncategorised/', $clean->start('/category/uncategorised/'));
	}

	public function testCleanStartPreCleaned()
	{
		$clean = new Clean();

		$this->assertEquals('category/uncategorised/', $clean->start('category/uncategorised/'));
	}

	public function testCleanEnd()
	{
		$clean = new Clean();

		$this->assertEquals('/category/uncategorised', $clean->end('/category/uncategorised/'));
	}

	public function testCleanEndPreCleaned()
	{
		$clean = new Clean();

		$this->assertEquals('/category/uncategorised', $clean->end('/category/uncategorised'));
	}
}