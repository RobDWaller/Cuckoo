<?php namespace Cuckoo\Route;

use Illuminate\Support\Collection;
use Cuckoo\Template\TemplateInterface;

class Load
{
    private $templateEngine;

    public function __construct(TemplateInterface $template)
    {
        $this->templateEngine = $template->make();
    }

    public function loadController($classString, Collection $parameters = null)
    {
        $controller = new $classString($this->templateEngine);

        $controller->load($parameters);
    }
}
