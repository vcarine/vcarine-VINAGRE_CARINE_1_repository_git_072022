<?php

namespace controllers\Visitor;

use App\controllers\MainController;

class VisitorController extends MainController{


    public function __construct(){
        $this->visitorManager = new \VisitorManager();
    }

    public function article(){
        $users = $this->visitorManagero->getUser();

        $data_page = [
            "page_description" => "Description de la page d'accueil",
            "page_title" => "Titre de la page d'accueil",
            "utilisateurs" =>  $users,
            "view" => "views/Visiteur/accueil.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function login(){
        $data_page = [
            "page_description" => "Page de connexion",
            "page_title" => "Page de connexion",
            "view" => "views/Visiteur/login.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function pageError($msg): void
    {
        parent::pageError($msg);
    }
}