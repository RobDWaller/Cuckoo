<?php namespace Cuckoo\Controller;

use Illuminate\Support\Collection;
use Cuckoo\Template\TemplateInterface;

class Tag implements ControllerInterface
{
	private $template;

	public function __construct(TemplateInterface $template)
	{
		$this->template = $template;
	}

	public function load(Collection $parameters)
	{
		$this->template->render('tag.twig', ['message' => 'These are the Tags', 'title' => 'Cuckoo Tags']);
	}
}