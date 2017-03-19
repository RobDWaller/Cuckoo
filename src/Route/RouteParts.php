<?php namespace Cuckoo\Route;

use Illuminate\Support\Collection;
use Cuckoo\Route\QueryParts;

class RouteParts
{
    private $urlString;

    private $queryString;

    public function __construct($urlString, $queryString = null)
    {
        $this->urlString = $urlString;

        $this->queryString = $queryString;
    }

    public function getUrlParts()
    {
        if (!empty($this->urlString) && $this->urlString !== '/') {
            return new Collection(explode('/', $this->urlString));
        }

        return new Collection([]);
    }

    public function getQueryParts()
    {
        if ($this->queryString !== null) {
            $parts = explode('&', $this->queryString);

            foreach ($parts as $part) {
                $partObjects[] = new QueryParts($part);
            }

            return new Collection($partObjects);
        }

        return new Collection([]);
    }
}
