<?php namespace Cuckoo\Helper;

trait Http
{
    public function httpGet()
    {
        return (object) $_GET;
    }

    public function httpPost()
    {
        return (object) $_POST;
    }
}