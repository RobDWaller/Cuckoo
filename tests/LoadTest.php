<?php
 
use Cuckoo\Route\Load;
use Illuminate\Support\Collection;
use Cuckoo\Template\Twig;
use Mockery as m;

class RouteLoadTest extends PHPUnit_Framework_TestCase 
{
	public function testLoadController()
	{
		$template = m::mock('Cuckoo\Template\Twig');

		$template->shouldReceive('make')
			->andReturn($template)
			->shouldReceive('render')
			->andReturn(null);

		$load = new Load($template);

		$load->loadController('Cuckoo\Controller\Category', new Collection(['hello', 'world']));
	}

	public function testLoadControllerNoParameters()
	{
		$template = m::mock('Cuckoo\Template\Twig');

		$template->shouldReceive('make')
			->andReturn($template)
			->shouldReceive('render')
			->andReturn(null);

		$load = new Load($template);

		$load->loadController('Cuckoo\Controller\Category', null);
	}

	public function tearDown()
    {
        m::close();
    }
}