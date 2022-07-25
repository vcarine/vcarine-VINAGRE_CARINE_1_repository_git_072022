<?php

namespace App\models;

class UserManager extends DbManager
{
    public function login($username,$email, $password)
    {
//        dd($username);
//        var_dump($username);
//        var_dump($email);
//        var_dump($password);
//        die();
        $user = null;
        $req = $this->getBdd()->prepare("SELECT * FROM user WHERE username = :username");
        $req->bindParam(':username', $username);
        $req->execute();


//        var_dump($req);
//        die();
        $resultat = $req->fetch(\PDO::FETCH_ASSOC);

        if ($resultat) {
//            var_dump($resultat);
            if (password_verify($password, $resultat['password'])) {
                $user = new User($resultat['id'], $resultat['username'],$resultat['email'], $resultat['password']);
            }
        }
        return $user;

    }

}
