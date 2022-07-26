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


//        $errors = [];
////        dd($_SERVER);
//        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
////            var_dump('traitement des données');
////            var_dump($_POST);
////            dd($_POST);
//            // JE VAIS APPELER MON USERMANAGER ET APPELER SA FONCTION LOGIN =>  QUI VA DONNE UN RESULTAT
//
//            if (empty($_POST['email'])) {
//                $errors[] = "Veuillez choisir un email";
//            }
//            if (empty($_POST['password']) /*|| strlen($password) < 6*/) {
//                $errors[] = "Veuillez choisir un password ";
//                /*et mot de passe doit contenir au moins 6 caractères*/
//            }
        require "Views/security/login.php";
    }
    //validator_login

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


}
