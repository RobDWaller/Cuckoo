<?php namespace Cuckoo\Controller;

use Illuminate\Support\Collection;
use Cuckoo\Template\TemplateInterface;
use Cuckoo\Helper\Http;

abstract class AbstractController
{
    use Http;

    protected $template;

    public function __construct(TemplateInterface $template)
    {
        $this->template = $template;
    }

    abstract public function load(Collection $parameters = null);
}
