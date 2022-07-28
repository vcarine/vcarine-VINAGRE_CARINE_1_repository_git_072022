<?php

namespace App\models;

class UserManager extends MainManager
{
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
    private function getPasswordUser($login){
        $req = "SELECT password FROM utilisateur WHERE login = :login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat['password'];
    }

    public function isCombinaisonValide($login,$password){
        $passwordBD = $this->getPasswordUser($login);
        return password_verify($password,$passwordBD);
    }

    public function estCompteActive($login){
        $req = "SELECT est_valide FROM utilisateur WHERE login = :login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return ((int)$resultat['est_valide'] === 1) ? true : false;
    }
//    public function readAll()
//    {
//        $users = [];
//        $results = $this->getBdd()->query("SELECT * FROM user");
//        while ($user = $results->fetch()) {
//            $users[] = new User($user);
//        }
//        return $users;
//    }
//
//    public function read(int $id)
//    {
//
//        $req = $this->getBdd()->prepare("SELECT * FROM user WHERE id = ?");
//        $req->bindValue(1, $id, PDO::PARAM_INT);
//        $req->execute();
//
//        return new User($req->fetch());
//    }
//
//    public function findByEmail(string $email)
//    {
//
//        $req = $this->getBdd()->prepare("SELECT * FROM user WHERE email = ?");
//        $req->bindValue(1, $email, PDO::PARAM_STR);
//        $req->execute();
//        $result = $req->fetch();
//        if (!$result) {
//            return null;
//        }
//        return new User($result);
//    }
//    public function findByUsername(string $username)
//    {
//        $req = $this->getBdd()->prepare("SELECT * FROM user WHERE username = ?");
//        $req->bindValue(1, $username, PDO::PARAM_STR);
//        $req->execute();
//        $result = $req->fetch();
//        if (!$result) {
//            return null;
//        }
//        return new User($result);
//    }
//
//    public function create(string $username, string $email, string $password, $role)
//    {
//
//        $req = $this->getBdd()->prepare("INSERT INTO user(username, email, password, roles)
//                VALUES(:username, :email :password, :role)");
//        $req->execute(
//            array(
//                ':username' => $username,
//                ':email' => $email,
//                ':password' => $password,
//                ':role' => $role
//            )
//        );
//        $newUserId = $this->getBdd()->lastInsertId();
//        return $newUserId;
//    }
//
//    public function delete(int $id)
//    {
//
//        $req = $this->getBdd()->prepare("DELETE FROM user WHERE id=?");
//        $req->execute(array($id));
//    }
//
//    public function update(int $id, string $username, string $email, string $password, int $role)
//    {
//
//        $req = $this->getBdd()->prepare("UPDATE user SET username = :username,email = :email,password = :password, roles = :role
//                WHERE id = :id");
//        $req->bindValue('username', $username, PDO::PARAM_STR);
//        $req->bindValue('email', $email, PDO::PARAM_STR);
//        $req->bindValue('password', $password, PDO::PARAM_STR);
//        $req->bindValue('role', $role, PDO::PARAM_INT);
//        $req->bindValue('id', $id, PDO::PARAM_INT);
//        $req->execute();
//        $result = $req->fetch();
//        if (!$result) {
//            return null;
//        }
//        return new User($result);
//        // return new User($r->fetch());
//    }
//
//    /**
//     * Deactivates a user entirely (won't be able to log in anymore)
//     *
//     * @param  integer $id
//     * @return void
//     */
//    public function disable(int $id)
//    {
//        $r = $this->getBdd()->prepare("UPDATE user SET deleted = :deleted WHERE id = :id");
//        $r->bindValue('deleted', true, PDO::PARAM_BOOL);
//        $r->bindValue('id', $id, PDO::PARAM_INT);
//        $r->execute();
//    }
//
//    /**
//     * Promotes user to role admin
//     *
//     * @param  int $id
//     * @return void
//     */
//    public function promote(int $id)
//    {
//        $r = $this->getBdd()->prepare("UPDATE user SET roles = :role WHERE id = :id");
//        $r->bindValue('role', true, PDO::PARAM_BOOL);
//        $r->bindValue('id', $id, PDO::PARAM_INT);
//        $r->execute();
//    }
//    /**
//     * Demotes user to simple user role
//     *
//     * @param  int $id
//     * @return void
//     */
//    public function demote(int $id)
//    {
//
//        $req = $this->getBdd()->prepare("UPDATE user SET roles = :role WHERE id = :id");
//        $req->bindValue('role', false, PDO::PARAM_BOOL);
//        $req->bindValue('id', $id, PDO::PARAM_INT);
//        $req->execute();
//    }


}