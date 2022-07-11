<?php

require_once "models/ArticleManager.php";

class ArticlesController
{
    private $articleManager;

    public function __construct()
    {

        $this->articleManager = new ArticleManager;
        $this->articleManager->loadingArticles();

    }

    public function displayArticles()

    {
        $articles = $this->articleManager->getArticles();
        require "views/articles.view.php";
    }
}


