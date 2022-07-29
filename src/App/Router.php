<?php

namespace App;

class Router {

    private $url; // Contiendra l'URL sur laquelle on souhaite se rendre
    private $router = []; // Contiendra la liste des routes

    public function __construct($url){
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     * @return Router
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return array
     */
    public function getRouter(): array
    {
        return $this->router;
    }

    /**
     * @param array $router
     * @return Router
     */
    public function setRouter(array $router): Router
    {
        $this->router = $router;
        return $this;
    }



}