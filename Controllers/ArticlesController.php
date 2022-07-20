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
        require "Views/Articles/articles.view.php";
    }

    /**
     * @param int $id
     *
     * @return void
     */
    public function showArticle(int $id): void
    {
        $article = $this->articleManager->showArticle($id);
        require "Views/Articles/show.article.view.php";
    }
    /**
     * @param int $id
     *
     * @return void
     */
    public function addArticle(): void
    {
        require "Views/Articles/add.article.view.php";
    }
    /**
     * @param int $id
     *
     * @return void
     */
//    Public function deleteArticle(Article $article): void
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
        require "Views/Articles/edit.article.view.php";
    }

}