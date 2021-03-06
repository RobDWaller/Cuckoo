<?php

require(__DIR__ . '/../vendor/autoload.php');

require(__DIR__ . '/Config.php');

use Cuckoo\Route\Route;

$route = new Route(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/');

$route->parts()->map()->load();
