<?php

class ArticleController
{

    public function listArticle()
    {
        require 'Views/articles/list.php';
    }

    public function detailArticle()
    {
        require 'Views/articles/detail.php';
    }

}


