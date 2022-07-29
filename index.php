<?php

use App\controllers\ArticlesController;
use App\controllers\HomeController;
use App\controllers\Toolbox;
use App\controllers\User\UserController;



include 'vendor/autoload.php';

define('URL', str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));
$homeController = new HomeController();
$userController = new UserController();


try {
    if(empty($_GET['page'])){
        $page = "article";
    } else {
        $url = explode("/", filter_var($_GET['page'],FILTER_SANITIZE_URL));
        $page = $url[0];
    }
//dd($page);
    switch($page){
        case "indexArticles" : $userController->indexArticles();
            break;
        case "login" : $userController->login();
            break;
        case "validation_login" :
            if(!empty($_POST['login']) && !empty($_POST['password'])){
                $login = Security::secureHTML($_POST['login']);
                $password = Security::secureHTML($_POST['password']);
                $userController->validation_login($login,$password);
            } else {
                Toolbox::addMessageAlerte("Login ou mot de passe non renseigné", Toolbox::COULEUR_ROUGE);
                header('Location: '.URL."login");
            }
            break;
        case "compte" :
            switch($url[1]){
                case "profile": $userController->indexArticles();
                    break;
                case "disconnect" : $userController->deconnexion();
                    break;
            }
            break;
        default :
            $homeController->index();
//        default : throw new Exception("La page n'existe pas");
    }
} catch (Exception $e){
    $userController->pageError($e->getMessage());
}


//try {
//    if (empty($_GET['page'])) {
//        require "Views/User/accueil.view.php";
//    } else {
//        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
//        match ($url[0]) {
//            'accueil' => require "Views/User/accueil.view.php",
//            'articles' => getDisplayArticle(),
//            'article' => actionArticle($url[1], $url[2]),
//
//            default => throw new Exception("La page n'existe pas"),
//        };
//    }
//} catch
//(Exception $e) {
//    echo $e->getMessage();
//}
/**
 * @return void
 */
function getDisplayArticle(): void
{
    $articles = new ArticlesController();
    $articles->displayArticles();
}

/**
 * @param string $parameter
 * @param int $id
 *
 * @return void
 *
 * @throws Exception
 */
function actionArticle(string $parameter, int $id): void
{
    $articles = new ArticlesController();
    if ($parameter === "s") {
        $articles->showArticle($id);
    } else if ($parameter === "a") {
        $articles->addArticle();
    } else if ($parameter === "e") {
        $articles->editArticle();
    } else if ($parameter === "d") {
        $articles->deleteArticle($id);
    } else {
        throw new Exception("La page n'existe pas");
    }
}


