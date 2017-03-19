<?php namespace Cuckoo\Route;

use Cuckoo\Route\Clean;
use Cuckoo\Route\Map;
use Illuminate\Support\Collection;
use Cuckoo\Template\Twig as Template;

class Route
{
    private $originalUrl;

    private $splitUrl;

    private $cleanUrl;

    private $queryParameters;

    private $routeParts;

    private $controllerString;

    private $hasController;

    private $parameters;

    public function __construct($routeString)
    {
        $this->originalUrl = $routeString;

        $this->splitQueryParameters();

        $this->clean();
    }

    private function splitQueryParameters()
    {
        $parts = explode('?', $this->getOriginalUrl());

        $this->splitUrl = $parts[0];

        if (isset($parts[1])) {
            $this->queryParameters = $parts[1];
        }
    }

    private function clean()
    {
        $clean = new Clean();

        $this->clean = $clean->start($this->splitUrl);

        $this->clean = $clean->end($this->clean);
    }

    public function getOriginalUrl()
    {
        return $this->originalUrl;
    }

    public function getQueryParameters()
    {
        return $this->queryParameters;
    }

    public function getCleanUrl()
    {
        return $this->clean;
    }

    public function getRouteParts()
    {
        return $this->routeParts;
    }

    public function getControllerString()
    {
        return $this->controllerString;
    }

    public function hasController()
    {
        return $this->hasController;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function parts()
    {
        $this->routeParts = new RouteParts($this->getCleanUrl(), $this->getQueryParameters());

        return $this;
    }

    public function map()
    {
        $map = new Map($this->getRouteParts());

        $this->controllerString = $map->getControllerString();

        $this->hasController = $map->hasController($this->controllerString);

        if (!$this->hasController) {
            if ($map->isPossiblePage()) {
                $this->controllerString = $map->getPageControllerString();
            }

            if ($map->isPossiblePost()) {
                $this->controllerString = $map->getPostControllerString();
            }
        }

        $this->parameters = $map->getParameters();

        return $this;
    }

    public function load()
    {
        $template = new Template();

        $load = new Load($template);

        $load->loadController($this->controllerString, $this->parameters);
    }
}
