<?php

namespace App\controllers;

class HomeController extends AbstractController
{
    public function index()
    {
        $data_page = [
            "page_description" => "Description de la page d'article",
            "page_title" => "Titre de la page d'article",
            "utilisateurs" =>  $users,
            "view" => "views/Articles/article.view.php",
            "template" => "views/template.php"
        ];
        $this->generatePage($data_page);
    }
}