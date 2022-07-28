<?php

namespace App\controllers\Security;

use App\controllers\MainController;
use App\controllers\Toolbox;
use App\models\UserManager;



class SecurityController extends MainController
{
    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    /**
     * @return void
     */
    public function login(): void
    {
        if (!empty($_SESSION['username'])) {
            header('Location: article.php');
        }
        if (!empty($_POST)) {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            extract($post);

            $errors = [];

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'L\'adresse email n\'est pas valide.';
            }

            if (empty($password)) {
                $errors[] = 'Le mot de passe est requis.';
            }

        }
        require "Views/Visitor/login.php";
    }

    /**
     * @return void
     */
    public function register(): void
    {

        $user = null;
        if (!empty($_SESSION['username'])) {
            header('Location: article.php');
        }
        if (!empty($_POST)) {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            extract($post);

            $errors = [];
            if (empty($_POST['username'])){
                $errors[] = "Veuillez choisir un username.";
            }

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'L\'adresse email n\'est pas valide.';
            }

            if($user && password_verify($password, $user->password)){
                $_SESSION['username'] = $user;
                header('Location: article.php');
            }
            if (empty($password) || strlen($password) < 5) {
                $errors[] = 'Le mot de passe est requis et doit contenir au moins 6 caractères.';
            }

        }
        require "Views/security/register.php";
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

}
