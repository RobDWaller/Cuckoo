<?php namespace Cuckoo\Route;

class Clean
{
    public function start($routeString)
    {
        if (preg_match("|^/|", $routeString)) {
            return substr($routeString, 1, strlen($routeString));
        }

        return $routeString;
    }

    public function end($routeString)
    {
        if (preg_match('|/$|', $routeString)) {
            return substr($routeString, 0, -1);
        }

        return $routeString;
    }
}
