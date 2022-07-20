<?php
namespace App\controllers;


class SecurityController
{
    public function login()
    {
        require 'Views/security/login.php';
    }

    public function register()
    {
        require 'Views/security/register.php';
    }
}
