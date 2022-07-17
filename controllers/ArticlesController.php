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
      /*var_dump($articles);*/
        require "views/articles.view.php";
    }

    public function showArticle($id){
        /*echo "id est  : ".$id;*/
        /*var_dump($id);*/
       $article = $this->articleManager->getArticleById($id);
       require "views/show.article.view.php";
     /*  var_dump($article);*/

    }
}


