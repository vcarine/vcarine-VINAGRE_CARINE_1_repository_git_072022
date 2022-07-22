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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//            var_dump('traitement des données');
//            var_dump($_POST);
            if(empty($_POST['username'])){
                $errors[] = 'Veuillez saisir un username';
            }

            if(empty($_POST['password'])){
                $errors[] = 'Veuillez saisir un password';
            }

            if(count($errors) == 0){
                $resultat = $this->userManager->login($_POST['username'], $_POST['password']);
                if(!is_null($resultat)){
                    //article (page)
                    $_SESSION['user'] = serialize($resultat);
                    header('Location: /articles');
                } else {
                    $errors[] = 'Les identifiants sont incorrectes !';
                }
            }

            // connexion
        }
        require "Views/security/login.php";
    }

    /**
     * @return void
     */
    public function register(): void
    {
        require "Views/security/register.php";
    }


}
