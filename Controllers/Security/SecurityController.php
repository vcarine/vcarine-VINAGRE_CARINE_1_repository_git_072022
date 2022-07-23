<?php

namespace App\controllers\Security;

use App\models\UserManager;

class SecurityController
{
    private $userManager;

    /**
     * @param $userManager
     */
    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    /**
     * @return void
     */
    public function login(): void
    {
        $errors = [];
//        dd($_SERVER);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//            var_dump('traitement des données');
//            var_dump($_POST);
//            dd($_POST);
            // JE VAIS APPELER MON USERMANAGER ET APPELER SA FONCTION LOGIN =>  QUI VA DONNE UN RESULTAT

            if (empty($_POST['username'])) {
                $errors[] = "Veuillez choisir un username";
            }
            if (empty($_POST['password'])) {
                $errors[] = "Veuillez choisir un password";
            }
            if (count($errors) == 0) {
                $resultat = $this->userManager->login($_POST['username'], $_POST['password']);
//            var_dump($resultat);
//            die();
                if(!is_null($resultat)){
                    $_SESSION['user'] = serialize($resultat);
                    header('Location: article.view.php');
                } else {
                    $errors = "les identifiants sont incorrectes";
                }
            }
        }

        require "Views/security/login.php";
    }

    /**
     * @return void
     */
    public function logout()
    {
        session_destroy();
        header('Location: index.php?controller=security&action=login');
    }

    /**
     * @return void
     */
    public function register(): void
    {
        require "Views/security/register.php";
    }


}
