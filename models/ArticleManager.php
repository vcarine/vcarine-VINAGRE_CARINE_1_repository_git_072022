<?php

namespace App\models;


use \PDO;

class ArticleManager extends DbManager
{
    private $articles; //tableau de livre

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
        $articles = $req->fetchAll(PDO::FETCH_ASSOC);
//        var_dump($articles);
        /*       echo"<pre>";
               print_r($articles);
               echo"</pre>";*/
        $req->closeCursor();

      foreach ($articles as $article) {
            $a = new Article($article['id'], $article['image_link'], $article['content'], $article['title'],  $article['author']);
            $this->addArticles($a);
        }

    }

    public function showArticle($id)
    {

        $request = $this->getBdd()->prepare('SELECT * FROM articles WHERE id = :id');

        $request->bindParam(':id', $id);

        $articles = $request->execute()->fetchOne();

        $request->closeClosure();

        foreach ($articles as $article) {
            $s = new Article($article['id'], $article['image_link'], $article['content'], $article['title'],  $article['author']);
            $this->showArticle($s);

        }
    }


}



