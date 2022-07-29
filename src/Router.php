<?php

namespace App;

use Route;

class Router
{

    private $url;
    private array $routes = [];

    /**
     * @param mixed $url
     */
    public function __construct(mixed $url)
    {
        $this->url = $url;
    }

    public function get($path, $callable)
    {
        $route = new Route($path, $callable);
        $this->routes['GET'][] = $route;
    }

    public function post($path, $callable)
    {
        $route = new Route($path, $callable);
        $this->routes['POST'][] = $route;
    }

    public function run()
    {
        echo '<pre>';
        echo print_r($this->routes);
        echo '</pre>';
    }
}