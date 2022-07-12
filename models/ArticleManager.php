<?php

require_once "db-manager.php";
require_once "article.php";


class ArticleManager extends DbManager{
    private $articles;

    public function addArticles($article)
    {
        $this->articles [] = $article;
    }

    /**
     * @return mixed
     */
    public function getArticles()
    {
        return $this->articles;
    }
    public function loadingArticles(){
        $req = $this->getBdd()->prepare("SELECT * FROM articles");
        $req->execute();
        $mesarticles = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($mesarticles as $article){
            $a = new Article($article['id'],$article['title'],$article['picture'],$article['content']);
            $this->addArticles($a);
        }
    }

}

