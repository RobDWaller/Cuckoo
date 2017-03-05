<?php namespace Cuckoo\Controller;

use Illuminate\Support\Collection;
use Cuckoo\Template\TemplateInterface;

class Category implements ControllerInterface
{
	private $template;

	public function __construct(TemplateInterface $template)
	{
		$this->template = $template;
	}

	public function load(Collection $parameters)
	{
		$this->template->render('category.twig', ['message' => 'These are the Categories', 'title' => 'Cuckoo Cateory']);
	}
}