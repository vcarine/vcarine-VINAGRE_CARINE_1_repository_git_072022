<?php


use App\controllers\ArticlesController;

include 'vendor/autoload.php';

define('URL', str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']));

//if ($_GET['controller'] == 'security' && $_GET['action'] == 'login') {
//$controller = new SecurityController();
//$controller-> login();
//}
$articles = new ArticlesController();
try {
    if (empty($_GET['page'])) {
        require "views/accueil.view.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch ($url[0]) {
            case 'accueil' :
                require "views/accueil.view.php";
                break;
            case 'articles' :
                $articles->displayArticles();
                break;
            case 'article':
                if ($url[1] === "s") {
                    $articles->showArticle((int)$url[2]);
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
