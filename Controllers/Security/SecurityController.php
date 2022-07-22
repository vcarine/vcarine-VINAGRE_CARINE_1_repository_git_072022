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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//            var_dump('traitement des données');
//            var_dump($_POST);
            $resultat = $this->userManager->login($_POST['username'], $_POST['password']);
            die();
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
