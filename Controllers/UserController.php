<?php
namespace App\controllers\User;

use App\controllers\AbstractController;
use App\controllers\Toolbox;
use App\models\Manager\UserManager;


class UserController extends AbstractController {
    private $userManager;

    public function __construct(){
        $this->userManager = new UserManager();
    }
    public function indexArticles(){
        $users = $this->userManager->getUser();

        $data_page = [
            "page_description" => "Description de la page d'article",
            "page_title" => "Titre de la page d'article",
            "utilisateurs" =>  $users,
            "view" => "views/Articles/article.view.php",
            "template" => "views/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function login(){
//        dd(1);
        $data_page = [
            "page_description" => "Page de connexion",
            "page_title" => "Page de connexion",
            "view" => "Views/User/login.php",
            "template" => "Views/template.php"
        ];
        $this->generatePage($data_page);
    }


    public function validation_login($login,$password){
        //combinaison login et mot passe est valid qui exist en bdd
        if($this->userManager->validCombination($login,$password)){

            if($this->userManager->activeAccount($login)){
                Toolbox::addMessageAlerte("Bon retour sur le site ".$login." !", Toolbox::COULEUR_VERTE);
                $_SESSION['profil'] = [
                    "login" => $login,
                ];
                header("location: ".URL."compte/profile");
            } else {
                Toolbox::addMessageAlerte("Le compte ".$login. " n'a pas été activé par mail", Toolbox::COULEUR_ROUGE);
                //renvoyer le mail de validation
                header("Location: ".URL."login");
            }
        } else {
            Toolbox::addMessageAlerte("Combinaison Login / Mot de passe non valide", Toolbox::COULEUR_ROUGE);
            header("Location: ".URL."login");
        }
    }
    public function profile(){
        $datas = $this->userManager->getUserInformation($_SESSION['profil']['login']);
        $_SESSION['profile']["role"] = $datas['role'];

        $data_page = [
            "page_description" => "Page de profil",
            "page_title" => "Page de profil",
            "user" => $datas,
            "view" => "views/User/profile.view.php",
            "template" => "views/template.php"
        ];
        $this->generatePage($data_page);
    }
    public function disconnect(){
        Toolbox::addMessageAlerte("La deconnexion est effectuée",Toolbox::COULEUR_VERTE);
        unset($_SESSION['profile']);
        header("Location: ".URL."article");
    }
    public function pageError($msg): void
    {
        parent::pageError($msg);
    }
}
