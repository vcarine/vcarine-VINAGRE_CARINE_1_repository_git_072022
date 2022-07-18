<?php

namespace App\controllers;

use App\models\ArticleManager;

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
//    dd($articles);
        require "views/articles.view.php";
    }

    public function showArticle($id)
    {
        $article = $this->articleManager->getArticle($id);
        dd($article);
        require "views/show.article.view.php";
    }
}