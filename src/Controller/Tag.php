<?php namespace Cuckoo\Controller;

use Illuminate\Support\Collection;
use Cuckoo\Controller\AbstractController;
use Cuckoo\Template\TemplateInterface;

class Tag extends AbstractController
{
    public function __construct(TemplateInterface $template)
    {
        parent::__construct($template);
    }

    public function load(Collection $parameters = null)
    {
        $this->template->render('tag.twig', ['message' => 'These are the Tags', 'title' => 'Cuckoo Tags']);
    }
}
