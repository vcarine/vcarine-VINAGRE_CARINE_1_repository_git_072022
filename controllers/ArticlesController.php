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
        require "views/articles.view.php";
    }

    public function showArticle($id)
    {
     /*   echo "L'id est : ".$id;*/ // affichage of
       $article = $this->articleManager->getArticleById($id);
       require "views/show.article.view.php";
    }
}


