<?php namespace Cuckoo\Controller;

use Illuminate\Support\Collection;
use Cuckoo\Controller\AbstractController;
use Cuckoo\Template\TemplateInterface;

class Home extends AbstractController
{
	public function __construct(TemplateInterface $template)
	{
		parent::__construct($template);
	}

	public function load(Collection $parameters = null)
	{
		$this->template->render('home.twig', ['message' => 'Welcome to the Home Page', 'title' => 'Cuckoo Home']);
	}
}