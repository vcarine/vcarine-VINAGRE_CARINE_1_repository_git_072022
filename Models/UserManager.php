<?php

namespace App\models;

class UserManager extends DbManager
{
    public function login($email, $password)
    {

        if (empty($errors)) {
            $req = $db->prepare('SELECT * FROM user WHERE email=:email');
            $req->bindValue(':email', $email, \PDO::PARAM_STR);
            $req->execute();

            $user = $req->fetch();
            if ($user && password_verify($password, $user->password)) {
                $_SESSION['user'] = $user;
                header('Location: article.php');
            }
            $errors[] = 'Mauvais identifiants';
        }

    }

    public function register($email, $username, $password)
    {
        if (empty($errors)) {
            $req = $this->getBdd()->prepare('SELECT * FROM user WHERE email = :email');
            $req->bindValue(':email', $email, \PDO::PARAM_STR);
            $req->execute();

            if ($req->rowCount() > 0) {
                $errors[] = 'Un utilisateur est déjà enregistré avec cet email.';
            }
            $req = $this->getBdd()->prepare('SELECT * FROM user WHERE username = :username');
            $req->bindValue(':username', $username, \PDO::PARAM_STR);
            $req->execute();

            if ($req->rowCount() > 0) {
                $errors[] = 'Un utilisateur est déjà enregistré avec ce nom.';
            }

            if (empty($errors)) {
                $req = $this->getBdd()->prepare('INSERT INTO user (username, email, password) VALUES (:username, :email, :password ');
                $req->bindValue(':username', $username, \PDO::PARAM_STR);
                $req->bindValue(':email', $email, \PDO::PARAM_STR);
                $req->bindValue(':password', password_hash($password, PASSWORD_ARGON2ID), \PDO::PARAM_STR);
                $req->execute();

                unset($username, $email, $password);
                $success = 'Votre inscription est terminée, vous pouvez <a href="login.php">vous connecter</a>.';
            }

        }

    }


}

