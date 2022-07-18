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
/*     var_dump($articles);*/
        require "views/articles.view.php";
    }
    public function showArticle(){
        $article = $this->articleManager->getArticles();
        var_dump($article);
        require "views/show.article.view.php";
    }
  }



