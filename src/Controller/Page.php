<?php namespace Cuckoo\Controller;

use Illuminate\Support\Collection;
use Cuckoo\Template\TemplateInterface;

class Page implements ControllerInterface
{
	private $template;

	public function __construct(TemplateInterface $template)
	{
		$this->template = $template;
	}

	public function load(Collection $parameters = null)
	{
		$this->template->render('page.twig', ['message' => 'This is a Page', 'title' => 'Cuckoo Page']);
	}
}