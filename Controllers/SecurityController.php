<?php
namespace App\controllers;



    class SecurityController{
        // Injection du manager userManager
        private $userManager;

        public function __construct(){
            // Initialiser mon manager pour pouvoir l'appeler
            $this->userManager = new UserManager();
        }

        public function logout(){
            // Détruit la session
            session_destroy();
            // Redirige l'utilisateur vers la page de login
            require "Views/articles.view.php";
            header('Location: index.php?controller=security&action=login');
        }

        public function login(){
            // variables qui servira à stocker les erreurs de validation du formulaire
            $errors = [];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Je fais les vérifications de mon formulaire
                if(empty($_POST['username'])){
                    $errors[] = 'Veuillez saisir un username';
                }

                if(empty($_POST['password'])){
                    $errors[] = 'Veuillez saisir un password';
                }

                // Si j'ai pas d'erreurs, je tempte une connexion
                if(count($errors) == 0){
                    // J'appel mon utilisateur Manager pour vérifier si un utilisateur existe
                    // avec le couple id/password saisie.
                    $loggedUser = $this->utilisateurManager->login($_POST['username'], $_POST['password']);

                    // Si jamais j'ai un utilisateur :
                    // C'est ok je l'ajoute dans ma session et je redirige vers une page sécurisée
                    if($loggedUser){
                        $_SESSION['user'] = serialize($loggedUser);
                        header('Location: index.php?controller=car&action=list');
                    } else {
                        // Sinon, les identifiants ne sont pas correctes
                      $errors[] = 'Indentifiants incorrects';
                    }
                }
            }

            // Affichage du formulaire de login
            require 'Vue/security/login.php';
        }


        // Cette fonction enregistre un utilisateur
        // Elle va devoir hashé son mot de passe
        public function register(){
            $errors = [];
            $lastSaisie = null;

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                // Je vérifie tous les champs de mon formulaire
                if(empty($_POST['nom'])){
                    $errors[] = 'Veuillez saisir un nom';
                } else {
                    $lastSaisie['nom'] = $_POST['nom'];
                }

                if(empty($_POST['email'])){
                    $errors[] = 'Veuillez saisir un email';
                } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                   $errors[] = 'Veuillez saisir un email valide';
                } else {
                    $lastSaisie['email'] = $_POST['email'];
                }

                if(empty($_POST['prenom'])){
                    $errors[] = 'Veuillez saisir un prénom';
                } else {
                    $lastSaisie['prenom'] = $_POST['prenom'];
                }

                if(empty($_POST['username'])){
                    $errors[] = 'Veuillez saisir un nom d\'utilisateur';
                }

                if(empty($_POST['password'])){
                    $errors[] = 'Veuillez saisir un password';
                } elseif (strlen($_POST['password'])<8){

                    $errors[] = 'Veuillez saisir 8 caractères pour le mot de passe';
                }

                // Si j'ai pas d'erreurs je vais aller vérifier si il n'y a pas un utilisateur qui a
                // Cet username et ce password
                if(count($errors) == 0){
                    $testByUsername = $this->utilisateurManager->testExistUtilisateurByUsername($_POST['username']);
                    $testByEmail = $this->utilisateurManager->testExistUtilisateurByEmail($_POST['email']);

                    if($testByEmail){
                        $errors[] = 'Email déjà existant !';
                        unset($lastSaisie['email']);
                    }

                    if($testByUsername){
                        $errors[] = 'Username déjà présent';
                        unset($lastSaisie['username']);
                    }

                    // Aucune erreur, je vais enregistrer mon utilisateur
                    if(count($errors) == 0){

                        // Je cré un nouvel objet utilisateur sans id. Ce dernier sera généré par la BDD
                        $user = new Utilisateur($_POST['nom'],
                            $_POST['prenom'], $_POST['email'], $_POST['username'], $_POST['password']);

                        // J'appel mon manager pour enregistrer en base l'utilisateur
                        // Je lui passe l'utilisateur que je souhaite ajouter en paramètre
                        $this->utilisateurManager->register($user);

                        // Mon utilisateur est enregistré, je redirige donc vers le login
                        header('Location: index.php?controller=security&action=login');
                    }
                }
            }

            require 'Vue/security/register.php';
        }
    }
?>
