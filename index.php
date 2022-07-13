<?php

define('URL', str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require "src/controller/ArticlesController.php";
/*require "vendor/autoload.php";
use ArticlesController\ArticlesController;*/
/*use App\src\controllerArticlesController;*/

$articleController = new ArticlesController();
try {
    if (empty($_GET['page'])) {
        require "views/accueil.view.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        /*    echo "<pre>";*/
/*        print_r($url);*/

        switch ($url[0]) {
            case "accueil" :
                require "views/accueil.view.php";
                break;
            case "articles" :
                if (empty($url[1])) {
                    $articleController->displayArticles();
                } else if($url[1] === "l") { //a = article
                    $articleController->displayArticle($url[2]);
                } else if($url[1] === "a") {
                    echo "ajouter d'un livre";
                } else if($url[1] === "m") {
                    echo "modifier un livre";
                } else if($url[1] === "s") {
                    echo "suppression d'un livre";
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
