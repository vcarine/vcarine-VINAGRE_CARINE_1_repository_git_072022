<?php

namespace App\models;

use DateTime;
use Exception;
use PDO;
use App\models\Article;

class ArticleManager extends DbManager
{
    private array $articles;

    /**
     * @param Article $article
     * @return void
     */
    public function addArticles(Article $article): void
    {
        $this->articles[] = $article;
    }

    /**
     * @return array
     */
    public function getArticles(): array
    {
        return $this->articles;
    }

    /**
     * @throws Exception
     */
    public function loadingArticles()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM Articles");
        $req->execute();
        $articles = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($articles as $article) {
            $a = $this->createdObjectArticle($article);
            $this->addArticles($a);
        }
    }

    /**
     * @param int $id
     *
     * @return Article
     *
     * @throws Exception
     */
    public function showArticle(int $id): Article
    {
        $request = $this->getBdd()->prepare('SELECT * FROM Articles WHERE id = :id');
        $request->bindParam(':id', $id);
        $request->execute();
        $article = $request->fetch(PDO::FETCH_ASSOC);

        return $this->createdObjectArticle($article);
    }

    /**
     * @param array $article
     *
     * @return Article
     *
     * @throws Exception
     */
    private function createdObjectArticle(array $article): Article
    {
        return new Article(
            $article['id'],
            $article['image_link'],
            $article['content'],
            $article['title'],
            $article['author'],
            new DateTime($article['createdAt'])
        );
    }
    /**
     * @param int $id
     *
     * @return Article
     *
     * @throws Exception
     */
    public function addArticle(int $id): /*?*/Article
    {
        $request = $this->getBdd()->prepare('SELECT * FROM Articles WHERE id = :id');
        $request->bindParam(':id', $id);
        $request->execute();
        $article = $request->fetch(PDO::FETCH_ASSOC);

        return $this->createdObjectArticle($article);
    }
    /**
     * @param int $id
     *
     *
     * @throws Exception
     */
    public function deleteArticle(int $id){
        $req = "
        Delete from Articles where id = :idArticle
        ";
        // debug une requete
//        print_r($req); die();
        $stmt = $this->getBdd()->prepare($req);
//        dd($stmt);
        $stmt->bindValue(":idArticle",$id,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();




    }

}
