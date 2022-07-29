<?php

namespace App\models;

use App\models\Manager\DbManager;
use PDO;

class UserManager extends DbManager
{

    public function getUser(){
        $req = $this->getBdd()->prepare("SELECT * FROM user");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

    private function getPasswordUser($login){
        $req = "SELECT password FROM user WHERE login = :login";
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
        $req = "SELECT est_valide FROM user WHERE login = :login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return ((int)$resultat['is_valide'] === 1) ? true : false;
    }

}