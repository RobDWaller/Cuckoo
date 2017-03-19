<?php namespace Cuckoo\Controller;

use Illuminate\Support\Collection;
use Cuckoo\Controller\AbstractController;
use Cuckoo\Template\TemplateInterface;

class Post extends AbstractController
{
    public function __construct(TemplateInterface $template)
    {
        parent::__construct($template);
    }

    public function load(Collection $parameters = null)
    {
        $this->template->render('post.twig', ['message' => 'This is a Post', 'title' => 'Cuckoo Post']);
    }
}
