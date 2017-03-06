<?php namespace Cuckoo\Controller;

use Illuminate\Support\Collection;
use Cuckoo\Template\TemplateInterface;

class Home implements ControllerInterface
{
	private $template;

	public function __construct(TemplateInterface $template)
	{
		$this->template = $template;
	}

	public function load(Collection $parameters = null)
	{
		$this->template->render('home.twig', ['message' => 'Welcome to the Home Page', 'title' => 'Cuckoo Home']);
	}
}