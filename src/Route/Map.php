<?php namespace Cuckoo\Route;

use Cuckoo\Route\RouteParts;
use Illuminate\Support\Collection;
use Cuckoo\Exception\RouteException;

class Map
{
    private $base = "Cuckoo\Controller";

    private $page = "Page";

    private $post = "Post";

    private $parts;

    private $parameters;

    private $controller;

    public function __construct(RouteParts $parts)
    {
        $this->parts = $parts;
    }

    public function build()
    {
        if ($this->parts->getUrlParts()->count() === 0) {
            $this->parameters = $this->parts->getQueryParts();

            $this->controller = 'Home';

            return true;
        } elseif ($this->parts->getUrlParts()->count() === 1) {
            $this->parameters = $this->parts->getQueryParts();

            $this->controller = 'Page';

            return true;
        } elseif ($this->parts->getUrlParts()->count() === 2) {
            $this->parameters = new Collection(
                array_merge(
                    [$this->parts->getUrlParts()->toArray()[1]],
                    $this->parts->getQueryParts()->count() ? $this->parts->getQueryParts()->toArray() : []
                )
            );

            $this->controller =  ucfirst($this->parts->getUrlParts()->first());

            return true;
        } elseif ($this->parts->getUrlParts()->count() > 2) {
            $this->parameters = new Collection(
                array_merge(
                    $this->parts->getUrlParts()->toArray(),
                    $this->parts->getQueryParts()->count() ? $this->parts->getQueryParts()->toArray() : []
                )
            );

            $this->controller = 'Post';

            return true;
        }

        throw new RouteException('Could not route map URL to controller.');
    }

    public function hasController($controllerString)
    {
        return class_exists($controllerString);
    }

    public function getPageControllerString()
    {
        return $this->base . '\\' . $this->page;
    }

    public function getPostControllerString()
    {
        return $this->base . '\\' . $this->post;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getControllerString()
    {
        return $this->base . "\\" .  $this->controller;
    }

    public function getParameters()
    {
        return $this->parameters;
    }
}
