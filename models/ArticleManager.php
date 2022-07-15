<?php

namespace App\models;

use PDO;

class ArticleManager extends DbManager
{
    private $articles; // tableau de livre

    public function addArticle($article){
        $this->articles[] = $article;
    }
    public function getArticles()
    {
        return $this->articles;
    }

    public function loadingArticles()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM articles");
        $req->execute();
        $articlesAll = $req->fetchAll(PDO::FETCH_ASSOC);
        /*       echo"<pre>";
               print_r($articles);
               echo"</pre>";*/
        $req->closeCursor();

        foreach ($articlesAll as $article) {
            $l = new Article($article['id'], $article['picture'], $article['content'], $article['title'], $article['created'], $article['update'], $article['slug'], $article['first_name'], $article['last_name']);
            $this->addArticles($l);
        }
    }

    public function getArticleById($id)
    {

    }

}

