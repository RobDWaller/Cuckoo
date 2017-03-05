<?php namespace Cuckoo\Template;

use Cuckoo\Template\TemplateInterface;
use Twig_Loader_Filesystem;
use Twig_Environment;

class Twig implements TemplateInterface
{
	private $templateEngine;

	public function make()
	{
		$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View/');
		
		$this->templateEngine = new Twig_Environment($loader, array(
		    'cache' => __DIR__ . '/../View/',
		));

		return $this;
	}

	public function render($template, array $data)
	{
		echo $this->templateEngine->render($template, $data);
	}
}