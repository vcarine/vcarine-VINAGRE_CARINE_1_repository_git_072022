<?php

namespace App\controllers\Security;

class SecurityController
{
    /**
     * @return void
     */
    public function login(): void
    {
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
