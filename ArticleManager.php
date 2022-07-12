<?php

class ArticleManager
{
    private $articles;

    public function addArticle($article)
    {
        $this->articles[] = $article;
    }

    /**
     * @return mixed
     */
    public function getArticles()
    {
        return $this->articles;
    }
}

