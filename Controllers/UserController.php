<?php
namespace App\controllers\User;
use App\controllers\MainController;
use App\controllers\Toolbox;
use App\models\UserManager;


class UserController extends MainController {
    private $userManager;

    public function __construct(){
        $this->userManager = new UserManager();
    }

    public function validation_login($login,$password){
        if($this->userManager->isCombinaisonValide($login,$password)){
            if($this->userManager->estCompteActive($login)){
                Toolbox::addMessageAlerte("Bon retour sur le site ".$login." !", Toolbox::COULEUR_VERTE);
                $_SESSION['profil'] = [
                    "login" => $login,
                ];
                header("location: ".URL."compte/profil");
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
    public function article(){
        $users = $this->userManager->getUser();

        $data_page = [
            "page_description" => "Description de la page d'accueil",
            "page_title" => "Titre de la page d'accueil",
            "utilisateurs" =>  $users,
            "view" => "views/Visitor/accueil.view.php",
            "template" => "views/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function login(){
        $data_page = [
            "page_description" => "Page de connexion",
            "page_title" => "Page de connexion",
            "view" => "views/Visitor/login.php",
            "template" => "views/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function pageError($msg){
        parent::pageError($msg);
    }
}
