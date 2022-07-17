<?php

use App\controllers\ArticlesController;

include 'vendor/autoload.php';

define('URL', str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']));

$articleController = new ArticlesController;

try {
    if (empty($_GET['page'])) {
        require "views/accueil.view.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
/*        var_dump($url);*/
        switch ($url[0]) {

            case "accueil" :
             /*   dd($url, $url[0]);*/
                require "views/accueil.view.php";
             /*   dd($url, $url[0]);*/
                break;
            case "articles" :
                if (empty($url[1])) {
                  /*  dd($url, $url[0]);*/
                    $articleController->displayArticles();
                } else if ($url[1] === "s") {
                   /* echo "afficher un article";*/
                    /*echo $url[2];*/
                    echo $articleController->showArticle($url[2]);
                } else if ($url[1] === "l") {
                    echo "ajouter un article";
                } else if ($url[1] === "m") {
                    echo "modifier un article";
                } else if ($url[1] === "d") {
                    echo "supprimer un article";
                } else {
                    throw new Exception("La page n'existe pas");
                }
                break;
            default :
                throw new Exception("La page n'existe pas");
        }
    }
}
catch
(Exception $e) {
    echo $e->getMessage();
}
