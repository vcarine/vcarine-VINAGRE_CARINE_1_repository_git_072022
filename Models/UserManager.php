<?php

namespace App\models;

class UserManager extends DbManager
{
    public function login($username, $password)
    {
//        var_dump($username);
//        var_dump($password);
        $user = null;
        $request = $this->getBdd()->prepare('SELECT * FROM User WHERE username = :username');
        $request->execute([
            'username' => $username
        ]);
        $resultat = $request->fetch();

        if ($resultat){
            if (password_verify($password, $resultat['password'])){
                $user = new User($resultat['id'],$resultat['username'], $resultat['password']);
            }
        }
        return($user);

        }
}