<?php namespace Cuckoo\Controller;

use Illuminate\Support\Collection;
use Cuckoo\Template\TemplateInterface;

class Post implements ControllerInterface
{
	private $template;

	public function __construct(TemplateInterface $template)
	{
		$this->template = $template;
	}

	public function load(Collection $parameters = null)
	{
		$this->template->render('post.twig', ['message' => 'This is a Post', 'title' => 'Cuckoo Post']);
	}
}