<?php

namespace App\models;

class UserManager extends DbManager
{
    public function login($username, $password)
    {

        $user = null;
        $request = $this->getBdd()->prepare("SELECT * FROM user WHERE username = :username");
        $request->execute([
            'username' => $username
        ]);

        $resultat = $request->fetch();

        if ($resultat) {
            if (password_verify($password, $resultat['password'])) {
                $user = new User($resultat['username'], $resultat['password'], $resultat['id']);
            }
        }

        return $user;

    }

}

