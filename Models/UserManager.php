<?php

namespace App\models;

use PDO;

class UserManager extends DbManager
{
    public function readAll()
    {
        $users = [];
        $results = $this->getBdd()->query("SELECT * FROM user");
        while ($user = $results->fetch()) {
            $users[] = new User($user);
        }
        return $users;
    }

    public function read(int $id)
    {
        $sql = "SELECT * FROM user WHERE id = ?";
        $r = $this->db->prepare($sql);
        $r->bindValue(1, $id, PDO::PARAM_INT);
        $r->execute();

        return new User($r->fetch());
    }

    public function findByEmail(string $email)
    {
        $sql = "SELECT * FROM user WHERE email = ?";
        $r = $this->db->prepare($sql);
        $r->bindValue(1, $email, PDO::PARAM_STR);
        $r->execute();
        $result = $r->fetch();
        if (!$result) {
            return null;
        }
        return new User($result);
    }
    public function findByUsername(string $username)
    {
        $sql = "SELECT * FROM user WHERE username = ?";
        $r = $this->db->prepare($sql);
        $r->bindValue(1, $username, PDO::PARAM_STR);
        $r->execute();
        $result = $r->fetch();
        if (!$result) {
            return null;
        }
        return new User($result);
    }

    public function create(string $username, string $email, string $first_name, string $last_name, string $password, $role)
    {
        $sql = "INSERT INTO user(username, email, first_name, last_name, password, role) 
                VALUES(:username, :email, :first_name, :last_name, :password, :role)";
        $r = $this->db->prepare($sql);
        $r->execute(
            array(
                ':username' => $username,
                ':email' => $email,
                ':first_name' => $first_name,
                ':last_name' => $last_name,
                ':password' => $password,
                ':role' => $role
            )
        );
        $newUserId = $this->db->lastInsertId();
        return $newUserId;
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM user WHERE id=?";
        $r = $this->db->prepare($sql);
        $r->execute(array($id));
    }

    public function update(int $id, string $username, string $email, string $first_name, string $last_name, string $password, int $role)
    {
        $sql = "UPDATE user SET username = :username,
                                email = :email,
                                first_name = :first_name,
                                last_name = :last_name,
                                password = :password,
                                role = :role
                WHERE id = :id";
        $r = $this->db->prepare($sql);
        $r->bindValue('username', $username, PDO::PARAM_STR);
        $r->bindValue('email', $email, PDO::PARAM_STR);
        $r->bindValue('first_name', $first_name, PDO::PARAM_STR);
        $r->bindValue('last_name', $last_name, PDO::PARAM_STR);
        $r->bindValue('password', $password, PDO::PARAM_STR);
        $r->bindValue('role', $role, PDO::PARAM_INT);
        $r->bindValue('id', $id, PDO::PARAM_INT);
        $r->execute();
        $result = $r->fetch();
        if (!$result) {
            return null;
        }
        return new User($result);
        // return new User($r->fetch());
    }

    /**
     * Deactivates a user entirely (won't be able to log in anymore)
     *
     * @param  integer $id
     * @return void
     */
    public function disable(int $id)
    {
        $sql = "UPDATE user SET deleted = :deleted WHERE id = :id";
        $r = $this->db->prepare($sql);
        $r->bindValue('deleted', true, PDO::PARAM_BOOL);
        $r->bindValue('id', $id, PDO::PARAM_INT);
        $r->execute();
    }

    /**
     * Promotes user to role admin
     *
     * @param  int $id
     * @return void
     */
    public function promote(int $id)
    {
        $sql = "UPDATE user SET role = :role WHERE id = :id";
        $r = $this->db->prepare($sql);
        $r->bindValue('role', true, PDO::PARAM_BOOL);
        $r->bindValue('id', $id, PDO::PARAM_INT);
        $r->execute();
    }
    /**
     * Demotes user to simple user role
     *
     * @param  int $id
     * @return void
     */
    public function demote(int $id)
    {
        $sql = "UPDATE user SET role = :role WHERE id = :id";
        $r = $this->db->prepare($sql);
        $r->bindValue('role', false, PDO::PARAM_BOOL);
        $r->bindValue('id', $id, PDO::PARAM_INT);
        $r->execute();
    }
//    public function login($email, $password)
//    {
//
//        if (empty($errors)) {
//            $req = $this->getBdd()->prepare('SELECT * FROM user WHERE email=:email');
//            $req->bindValue(':email', $email, PDO::PARAM_STR);
//            $req->execute();
//
//            $user = $req->fetch();
//            if ($user && password_verify($password, $user->password)) {
//                $_SESSION['user'] = $user;
//                header('Location: article.php');
//            }
//            $errors[] = 'Mauvais identifiants';
//        }
//
//    }
//
//    public function register($email, $username, $password)
//    {
//        if (empty($errors)) {
//            $req = $this->getBdd()->prepare('SELECT * FROM user WHERE email = :email');
//            $req->bindValue(':email', $email, PDO::PARAM_STR);
//            $req->execute();
//
//            if ($req->rowCount() > 0) {
//                $errors[] = 'Un utilisateur est déjà enregistré avec cet email.';
//            }
//            $req = $this->getBdd()->prepare('SELECT * FROM user WHERE username = :username');
//            $req->bindValue(':username', $username, PDO::PARAM_STR);
//            $req->execute();
//
//            if ($req->rowCount() > 0) {
//                $errors[] = 'Un utilisateur est déjà enregistré avec ce nom.';
//            }
//
//            if (empty($errors)) {
//                $req = $this->getBdd()->prepare('INSERT INTO user (username, email, password) VALUES ( :email,:username, :password ');
//                $req->bindValue(':username', $username, PDO::PARAM_STR);
//                $req->bindValue(':email', $email, PDO::PARAM_STR);
//                $req->bindValue(':password', password_hash($password, PASSWORD_ARGON2ID), \PDO::PARAM_STR);
//                $req->execute();
//
//                unset($username, $email, $password);
//                $success = 'Votre inscription est terminée, vous pouvez <a href="login.php">vous connecter</a>.';
//            }
//
//        }
//
//    }


}

