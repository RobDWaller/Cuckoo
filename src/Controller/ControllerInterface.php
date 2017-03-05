<?php namespace Cuckoo\Controller;

use Illuminate\Support\Collection;
use Cuckoo\Template\TemplateInterface;

interface ControllerInterface
{
	public function __construct(TemplateInterface $template);

	public function load(Collection $parameters);
}