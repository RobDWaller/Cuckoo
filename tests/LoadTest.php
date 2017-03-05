<?php
 
use Cuckoo\Route\Load;
use Illuminate\Support\Collection;

class RouteLoadTest extends PHPUnit_Framework_TestCase 
{
	public function testLoadController()
	{
		$load = new Load;

		$load->loadController('Cuckoo\Controller\Category', new Collection(['hello', 'world']));
	}
}