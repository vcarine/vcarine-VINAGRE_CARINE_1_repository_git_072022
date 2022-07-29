<?php

namespace App\controllers;

abstract class AbstractController
{
    protected function generatePage($data): void
    {
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }

    public function pageError($msg): void
    {
        $data_page = [
            "page_description" => "Page permettant de gérer les erreurs",
            "page_title" => "Page d'erreur",
            "msg" => $msg,
            "view" => "./views/erreur.view.php",
            "template" => "views/template.php"
        ];
        $this->generatePage($data_page);
    }
}