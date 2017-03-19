<?php namespace Cuckoo\Controller;

use Illuminate\Support\Collection;
use Cuckoo\Controller\AbstractController;
use Cuckoo\Template\TemplateInterface;

class Page extends AbstractController
{
	public function __construct(TemplateInterface $template)
	{
		parent::__construct($template);
	}

	public function load(Collection $parameters = null)
	{
		$this->template->render('page.twig', ['message' => 'This is a Page', 'title' => 'Cuckoo Page']);
	}
}