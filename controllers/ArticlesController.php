<?php

namespace App\controllers;

use App\models\ArticleManager;

class ArticlesController
{
    private ArticleManager $articleManager;

    public function __construct()
    {
        $this->articleManager = new ArticleManager;
        $this->articleManager->loadingArticles();
    }

    /**
     * @return void
     */
    public function displayArticles(): void

    {
        $articles = $this->articleManager->getArticles();
        require "views/articles.view.php";
    }

    /**
     * @param int $id
     *
     * @return void
     */
    public function showArticle(int $id): void
    {
        $article = $this->articleManager->showArticle($id);
        require "views/show.article.view.php";
    }
}