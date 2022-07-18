<?php
namespace App\controllers;


class SecurityController
{
    public function login()
    {
        require 'views/security/login.php';
    }

    public function register()
    {
        require 'views/security/register.php';
    }
}
