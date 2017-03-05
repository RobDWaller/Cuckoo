<?php

require(__DIR__ . '/../vendor/autoload.php');

use Cuckoo\Route\Route;

$route = new Route($_SERVER['REQUEST_URI']);

$route->parts()->map()->load();