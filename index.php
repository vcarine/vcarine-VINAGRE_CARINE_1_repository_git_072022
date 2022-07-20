<?php

use App\controllers\ArticlesController;

include 'vendor/autoload.php';

session_start();

define('URL', str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));


$articles = new ArticlesController();
try {
    if (empty($_GET['page'])) {
        require "Views/accueil.view.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch ($url[0]) {
            case 'accueil' :
                require "Views/accueil.view.php";
                break;
            case 'Articles' :
                $articles->displayArticles();
                break;
            case 'article':
                if ($url[1] === "s") {
                    $articles->showArticle((int)$url[2]);
                } else if ($url[1] === "a") {
                    $articles->addArticle();
                } else if ($url[1] === "e") {
                    $articles->editArticle();
                } else if ($url[1] === "d") {
                    $articles->deleteArticle((int)$url[2]);
                } else {
                    throw new Exception("La page n'existe pas");
                }
                break;
            default :
                throw new Exception("La page n'existe pas");
        }
    }
} catch
(Exception $e) {
    echo $e->getMessage();
}

// On vérifie que l'on a pas de paramètres get dans l'url.
//Si c'est le cas, on redirige vers la page d'acceuil de notre application
if(!isset($_GET['controller']) || !isset($_GET['action'])){
    // Redirection vers la homepage
    header('Location: index.php?controller=article&action=article');
}

// Je regarde le controlleur. Si c'est un appel du securityController,
// Je cré un nouvel objet SecurityController
if ($_GET['controller'] == 'security') {

    $security = new App\controllers\SecurityController();
    // Si mon parametre get action est égal à Login,
    // j'appel la fonction login de mon controlleur Security
    if( $_GET['action'] == 'login'){
        $security->login();
    }
    // Ici j'appel la fonction register de mon objet SecurityController
    if ($_GET['action'] == 'register'){
        $security->register();
    }
    // J'appel la fonction logout de mon SecurityController
    if ($_GET['action'] == 'logout'){
        $security->logout();
    }

}





