<?php namespace Cuckoo\Route;

use Cuckoo\Route\RouteParts;

class Map
{
	private $base = "Cuckoo\Controller";

	private $page = "Page";

	private $post = "Post";

	private $parts;

	public function __construct(RouteParts $parts)
	{
		$this->parts = $parts;
	}

	public function getControllerString()
	{
		return $this->base . "\\" .  $this->getControllerClassName($this->parts->getUrlParts()->first());
	}

	private function getControllerClassName($urlPartString)
	{
		return empty($urlPartString) ? 'Home' : ucfirst($urlPartString);
	}

	public function hasController($controllerString)
	{
		return class_exists($controllerString);
	}

	public function isPossiblePage()
	{
		return $this->parts->getUrlParts()->count() === 1;
	}

	public function isPossiblePost()
	{
		return $this->parts->getUrlParts()->count() === 4;
	}

	public function getPageControllerString()
	{
		return $this->base . '\\' . $this->page;
	}

	public function getPostControllerString()
	{
		return $this->base . '\\' . $this->post;
	}

	public function getParameters()
	{
		return $this->parts->getQueryParts();
	}
}