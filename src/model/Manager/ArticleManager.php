<?php

namespace App\models;

use \PDO;

class ArticleManager extends AbstractDbManager
{
    private $articles;

    public function addArticles($article)
    {
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
            $a = new Article($article['id'], $article['picture'], $article['content'], $article['title'], $article['created'], $article['update'], $article['slug'], $article['first_name'], $article['last_name']);
            $this->addArticles($a);
        }

    }

    public function getArticleById($id)
    {
        for($i=0; $i < count($this->articles);$i++)
        {
            if($this->articles[$i]->getId() === $id){
                return $this->articles[$i];
            }
        }

    }


}

