<?php

namespace App\models;

class UserManager extends DbManager
{
    public function login($email, $password)
    {
//        dd($username);
//        var_dump($username);
//        var_dump($email);
//        var_dump($password);
//        die();
        $user = null;
        $req = $this->getBdd()->prepare("SELECT * FROM user WHERE email = :email");
        $req->bindParam(':email', $email);
        $req->execute();


//        var_dump($req);
//        die();
        $resultat = $req->fetch(\PDO::FETCH_ASSOC);

        if ($resultat) {
//           var_dump($resultat);
            if (password_verify($password, $resultat['password'])) {
                $user = new User($resultat['id'], $resultat['username'], $resultat['email'], $resultat['password']);
            }
        }
        return $user;

    }

    public function register($email, $username, $password)
    {
        // username
        $req = $this->getBdd()->prepare("SELECT * FROM user WHERE username= :username");
        $req->bindParam(':username', $username);
        $req->execute();

        // email
        $req = $this->getBdd()->prepare('SELECT * FROM user WHERE email = :email');
        $req->bindValue(':email', $email, \PDO::PARAM_STR);
        $req->execute();

        //password
        if (empty($errors)) {
            $req = $this->getBdd()->prepare('INSERT INTO user (username, email, password, created_at) VALUES (:username, :email, :password, NOW()) ');
            $req->bindValue(':name', $username, \PDO::PARAM_STR);
            $req->bindValue(':email', $email, \PDO::PARAM_STR);
            $req->bindValue(':password', password_hash($password, PASSWORD_ARGON2ID), \PDO::PARAM_STR);
            $req->execute();

        }

    }

}



