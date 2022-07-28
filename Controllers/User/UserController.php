<?php
namespace App\controllers\User;
use App\controllers\MainController;
use App\controllers\Toolbox;
use App\models\UserManager;


class UserController extends MainController{
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
    public function pageError($msg): void
    {
        parent::pageError($msg);
    }
}
