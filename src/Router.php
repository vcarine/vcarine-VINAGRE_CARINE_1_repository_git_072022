<?php

namespace App;

class Router
{

    private $url;
    private $routes = [];

    /**
     * @param mixed $url
     */
    public function __construct(mixed $url)
    {
        $this->url = $url;
    }

    public function get($path, $callable)
    {
        $route = new \Route($path, $callable);
        $this->routes['GET'][] = $route;
    }
    public function post($path, $callable)
    {
        $route = new \Route($path, $callable);
        $this->routes['POST'][] = $route;
    }
}