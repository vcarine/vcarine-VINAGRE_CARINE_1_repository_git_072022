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
    public function displayArticle($id){
        $livre = $this->articleManager->getArticleById($id);
        require "views/displayArticle.view.php";
    }
    public function addArticles(){
        require "views/addArticle.view.php";
    }
}