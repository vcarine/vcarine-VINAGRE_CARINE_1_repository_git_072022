<?php
include 'vendor/autoload.php';

require 'include.php';

// Page par défaut de notre application
if(!isset($_GET['controller']) || !isset($_GET['action'])){
    header('Location: index.php?controller=article&action=list');
}
elseif  ($_GET['controller'] == 'article'){
    $controller = new ArticleController();
    if ($_GET['action'] == 'detail'&& isset($_GET['id'])){
    /*    var_dump('je suis là');*/
        $controller->detailArticle();
    }elseif ($_GET['action'] == 'list'){
        $controller->listArticle();
    }
}

