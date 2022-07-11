<?php

require_once "controllers/ArticlesController.php";

$articleController = new ArticlesController;

if (empty($_GET['page'])) {
    require "views/accueil.view.php";
} else {
    switch ($_GET['page']) {
        case "accueil" :
            require "views/accueil.view.php";
            break;
        case "articles" :
            $articleController->displayArticles();
            break;
    }
}


