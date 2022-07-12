<?php

    if(empty($_GET['page'])){
        require "views/accueil.php";
    }else{
        switch($_GET['page']){
            case "accueil" :  require "views/accueil.php";
            break;
            case "articles" :  require "views/articles.php";
            break;
        }
    }


