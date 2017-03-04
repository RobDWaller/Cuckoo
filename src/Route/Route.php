<?php namespace Cuckoo\Route;

use Cuckoo\Route\Clean;

class Route
{
	private $originalUrl;

	private $splitUrl;

	private $cleanUrl;

	private $queryParameters;

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

	public function parts()
	{
		return new RouteParts($this->getCleanUrl(), $this->getQueryParameters());
	}

}