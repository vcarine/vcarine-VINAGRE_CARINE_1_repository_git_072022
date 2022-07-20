<?php

namespace App\controllers;

use App\models\Article;
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
    /**
     * @param int $id
     *
     * @return void
     */
    public function addArticle(): void
    {
        require "views/articles/add.article.view.php";
    }
    /**
     * @param int $id
     *
     * @return void
     */
//    public function deleteArticle(Article $article): void
    public function deleteArticle( int $id): void
    {
        $article = $this->articleManager->deleteArticle($id);

    }

    /**
     * @param int $id
     *
     * @return void
     */
    public function editArticle(): void
    {
        require "views/edit.article.view.php";
    }

}