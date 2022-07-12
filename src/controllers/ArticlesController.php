<?php

namespace controllers;

use models\ArticleManager;

require_once "src/models/ArticleManager.php";


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

    public function displayArticle($id)
    {
        $article = $this->articleManager->getArticleById($id);
        echo $article->getTitle();
    }
}


