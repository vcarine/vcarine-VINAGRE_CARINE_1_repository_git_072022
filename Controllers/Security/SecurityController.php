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

            if (empty($_POST['email'])) {
                $errors[] = "Veuillez choisir un email";
            }
            if (empty($_POST['password']) /*|| strlen($password) < 6*/) {
                $errors[] = "Veuillez choisir un password ";
                /*et mot de passe doit contenir au moins 6 caractères*/
            }

        }

        require "Views/security/login.php";
    }

    /**
     * @return void
     */
    public function register(): void
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
            if (empty($_POST['email'])) {
                $errors[] = "Veuillez choisir un email";
            }
            if (empty($_POST['password'])) {
                $errors[] = "Veuillez choisir un password";
            }
            if ($email->rowCount() > 0) {
                $errors[] = 'Un utilisateur est déjà enregistré avec cet email.';
            }

            // VARIABLES
            $email 				= htmlspecialchars($_POST['email']);
            // ADRESSE EMAIL VALIDE
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

                header('location: inscription.php?error=1&message=Votre adresse email est invalide.');
                exit();

            }


        }
        require "Views/security/register.php";
    }


}
