<?php namespace Cuckoo\Template;

interface TemplateInterface
{
    public function make();

    public function render($template, array $data);
}
