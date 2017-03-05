<?php namespace Cuckoo\Controller;

use Illuminate\Support\Collection;

interface ControllerInterface
{
	public function __construct();

	public function load(Collection $parameters);
}