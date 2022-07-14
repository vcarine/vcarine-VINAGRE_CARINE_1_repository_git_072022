<?php

namespace App\controllers;

use App\models\ArticleManager;

class ArticlesController
{
    private $articleManager;

    public function __construct()
    {
        $this->articleManager = new ArticleManager;
        $this->articleManager->loadingArticles();

    }

   public function displayArticles()
    {
        $articles = $this->articleManager->getArticles();
        require "views/articles.view.php";
    }
    public function displayArticle($id)
    {
        $articles = $this->articleManager->getArticleById($id);
        require "views/displayArticle.view.php";
    }
    public function addArticle()
    {
        require "views/addArticle.view.php";
    }

    public function addArticleValidation()
    {
        $file = $_FILES['image'];
   /*     echo "<pre>";
        print_r($_FILES);
        echo "<pre>";*/
        $directory = "public/images/";
        $imageNameAdd = $this->addPicture($file,$directory);
        $this->articleManager->addArticleBdd($_POST['title'],$_POST['article'],$imageNameAdd);
        header('Location: '. URL . "articles");
    }

    private function addPicture($file, $dir){
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");

        if(!file_exists($dir)) mkdir($dir,0777);

        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $random = rand(0,99999);
        $target_file = $dir.$random."_".$file['name'];

        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if(file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        if(!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random."_".$file['name']);
    }
}


